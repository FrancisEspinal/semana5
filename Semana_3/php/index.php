<!DOCTYPE html>
<html>
<head>
  <title>Conexión a Mariadb desde NGINX</title>
  <style>
    table {
      border-collapse: collapse;
      width: 100%;
    }

    th, td {
      border: 3px solid black;
      padding: 15px;
      text-align: center;
    }
  </style>
</head>
<body>
  <h1>Datos de base de datos Mariadb</h1>

  <?php
    $host = "mariadb"; 
    $user = "2171272";
    $password = "2171272";
    $dbname = "estudiante";
    // Crear una conexión a la base de datos
    $conn = new mysqli($host, $user, $password, $dbname);
    
    // Verificar la conexión
    if ($conn->connect_error) {
      die("Error de conexión: " . $conn->connect_error);
    }
    
    // Consulta SQL para obtener los datos
    $query = "SELECT * FROM datos";
    $result = $conn->query($query);
    
    if ($result->num_rows > 0) {
      echo "<table>";
      echo "<tr><th>Matricula</th><th>Nombre</th><th>Apellido</th></tr>";
      
      while ($row = $result->fetch_assoc()) {
        echo "<tr>";
        echo "<td>" . $row['id'] . "</td>";
        echo "<td>" . $row['nombre'] . "</td>";
        echo "<td>" . $row['apellido'] . "</td>";
        echo "</tr>";
      }
      
      echo "</table>";
    } else {
      echo "No se encontraron registros";
    }
    
    // Cerrar la conexión
    $conn->close();
  ?>
</body>
</html>
