<?php
header("Access-Control-Allow-Origin: *");
header("Access-Control-Allow-Methods: GET, POST, PUT, DELETE, OPTIONS");
header("Access-Control-Allow-Headers: Content-Type, Authorization");
header("Content-Type: application/json");

// Konfigurasi database MySQL
$servername  = "localhost";
$dbUsername  = "zaens";      // ganti dengan username MySQL Anda
$dbPassword  = "zaens";      // ganti dengan password MySQL Anda
$dbName      = "mahasiswa"; // ganti dengan nama database Anda

// Buat koneksi ke database
$conn = new mysqli($servername, $dbUsername, $dbPassword, $dbName);
if ($conn->connect_error) {
    http_response_code(500);
    echo json_encode(["message" => "Database connection failed: " . $conn->connect_error]);
    exit;
}

// Mendapatkan base path secara otomatis
// Contoh: jika script berada di "/project/user/index.php", maka $basePath = "/project/user/"
$scriptName = $_SERVER['SCRIPT_NAME'];  
$basePath   = str_replace(basename($scriptName), '', $scriptName);

// Mendapatkan URI request dan menghapus query string (jika ada)
$requestUri = $_SERVER['REQUEST_URI'];
if (($pos = strpos($requestUri, '?')) !== false) {
    $requestUri = substr($requestUri, 0, $pos);
}

// Hapus base path dari URI, jika ada
if (strpos($requestUri, $basePath) === 0) {
    $requestUri = substr($requestUri, strlen($basePath));
}

$requestUri = trim($requestUri, '/');
$segments   = explode('/', $requestUri);

// Cek apakah URL diawali dengan "users"
if (isset($segments[0]) && $segments[0] === 'mahasiswa') {
    if ($_SERVER['REQUEST_METHOD'] === 'GET') {
        $name = isset($segments[1]) ? urldecode(trim(strval($segments[1]))) : null;
        
        if ($name !== null) {
            $stmt = $conn->prepare("SELECT * FROM mahasiswa WHERE name = ?");
            $stmt->bind_param("s", $name);
            $stmt->execute();

            $result = $stmt->get_result();

            if ($result->num_rows > 0) {
                $user = $result->fetch_assoc();
                http_response_code(200);
                echo json_encode($user);
            } else {
                http_response_code(404);
                echo json_encode(["message" => "mahasiswa not found"]);
            }
            $stmt->close();
        } else {
            // Mengambil semua user
            $result = $conn->query("SELECT * FROM mahasiswa");
            $users  = [];
            while ($row = $result->fetch_assoc()) {
                $users[] = $row;
            }
            http_response_code(200);
            echo json_encode($users);
        }
    } elseif ($_SERVER['REQUEST_METHOD'] === 'POST') {
        // Mendapatkan data yang dikirim
        $data = json_decode(file_get_contents("php://input"), true);
        if (!isset($data["name"]) || !isset($data["nim"]) || !isset($data["email"])) {
            http_response_code(400);
            echo json_encode(["message" => "Please, fill name, nim, email!"]);
        } else {
            // Menambahkan user baru menggunakan prepared statement
            $stmt = $conn->prepare("INSERT INTO mahasiswa (name, nim, email) VALUES (?, ?, ?)");
            $stmt->bind_param("sss", $data["name"], $data["nim"], $data["email"]);

            if ($stmt->execute()) {
                $newId = $stmt->insert_id;
                http_response_code(201);
                echo json_encode(["message" => "mahasiswa added successfully!"]);
            } else {
                http_response_code(500);
                echo json_encode(["message" => "Server Error!" ]);
            }
            $stmt->close();
        }
    } elseif ($_SERVER['REQUEST_METHOD'] === 'PUT') {
        // Mendapatkan data yang dikirim
        $data = json_decode(file_get_contents("php://input"), true);
        $id = isset($segments[1]) ? intval($segments[1]) : null;
    
        // Memastikan data yang dibutuhkan tersedia

        if (!isset($id)){
            http_response_code(400);
            echo json_encode(["message" => "Membutuhkan parameter ID mahasiswa"]);
        }else if (!isset($data["name"]) || !isset($data["nim"]) || !isset($data["email"])) {
            http_response_code(400);
            echo json_encode(["message" => "please, fill name, nim and email!"]);
        } else {
            // Update data mahasiswa berdasarkan ID menggunakan prepared statement
            $stmt = $conn->prepare("UPDATE mahasiswa SET name = ?, nim = ?, email = ? WHERE id = ?");
            $stmt->bind_param("sssi", $data["name"], $data["nim"], $data["email"], $id);
    
            if ($stmt->execute()) {
                if ($stmt->affected_rows > 0) {
                    http_response_code(200);
                    echo json_encode(["message" => "Mahasiswa updated successfully!"]);
                } else {
                    http_response_code(404);
                    echo json_encode(["message" => "Update Mahasiswa failed!"]);
                }
            } else {
                http_response_code(500);
                echo json_encode(["message" => "Server Error!"]);
            }
            $stmt->close();
        }
    } else {
        http_response_code(405);
        echo json_encode(['message' => 'Method not allowed']);
    }
} else if (isset($segments[0]) && $segments[0] === '') {
  header("Content-Type: text/html");
?>
  <!DOCTYPE html>
  <html lang="en">

  <head>
    <meta charset="utf-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1" />
    <meta name="description" content="SwaggerUI" />
    <title>SwaggerUI</title>
    <link rel="stylesheet" href="https://unpkg.com/swagger-ui-dist@5.11.0/swagger-ui.css" />
  </head>

  <body>
    <div id="swagger-ui"></div>
    <script src="https://unpkg.com/swagger-ui-dist@5.11.0/swagger-ui-bundle.js" crossorigin></script>
    <script>
      window.onload = () => {
        window.ui = SwaggerUIBundle({
          url: 'swagger.json',
          dom_id: '#swagger-ui',
        });
      };
    </script>
  </body>

  </html>
<?php
}
?>

<?php

$conn->close();
?>
