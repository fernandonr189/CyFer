<?php
    session_start();
    use PHPMailer\PHPMailer\PHPMailer;
    use PHPMailer\PHPMailer\SMTP;
    use PHPMailer\PHPMailer\Exception;
    include 'connection.php';

    $id = $_SESSION["User_id"];

    $sql = "SELECT p.name, p.image, p.price, p.description, s.id FROM products p, shopping_kart s, user_login_info u WHERE s.product_id = p.id AND s.user_id = u.id AND u.id = $id";

	$result = $conn->query($sql);

    $sql_price = "SELECT sum(p.price) FROM products p, shopping_kart s, user_login_info u WHERE s.product_id = p.id AND s.user_id = u.id AND u.id = $id";
	$result_price = $conn->query($sql_price);

    require 'vendor/autoload.php';
    require 'vendor/fpdf/fpdf.php';
    $pdf=new FPDF();

    $pdf = new FPDF();

    $pdf->AddPage();
    
    // Set the font for the text
    $pdf->SetFont('Arial', 'B', 18);


    $pdf->Image('logo.png',10,8,33);
    // Arial bold 15
    $pdf->SetFont('Arial','B',15);
    // Movernos a la derecha
    $pdf->Cell(80);
    // Título
    $pdf->Cell(30,10,'Factura',1,0,'C');
    // Salto de línea
    $pdf->Ln(20);
    
    // Prints a cell with given text 
    $pdf->Cell(60,20, "Gracias por tu compra"." ".$_SESSION["User_name"]);

    while($rows=$result->fetch_assoc()) {
        $pdf->Ln(20);
        $pdf->Cell(60,20, "Concepto: ".$rows['name']." \$".$rows['price']);
    }

    while($rows=$result_price->fetch_assoc()) {
        $pdf->Ln(20);
        $pdf->Cell(60,20, "Total a pagar: $".$rows['sum(p.price)']);
    }
    
    
    // return the generated output
    //$pdf->Output();
    $pdf->Output("Factura.pdf","F");

    $outlook_mail = new PHPMailer();
    $outlook_mail->IsSMTP();
    // Send email using Outlook SMTP server
    $outlook_mail->Host = 'smtp-mail.outlook.com';
    // port for Send email
    $outlook_mail->Port = 587;
    $outlook_mail->SMTPSecure = 'tls';
    $outlook_mail->SMTPDebug = 0;
    $outlook_mail->SMTPAuth = true;
    $outlook_mail->Username = 'CyFer.ventas@outlook.com';
    $outlook_mail->Password = '12345678Fer';
     
    $outlook_mail->From = 'CyFer.ventas@outlook.com';
    $outlook_mail->FromName = 'CyFer.ventas@outlook.com';// frome name
    $outlook_mail->AddAddress($_SESSION['User_email'], $_SESSION['User_name']);  // Name is optional
     
    $outlook_mail->IsHTML(true); // Set email format to HTML
     
    $outlook_mail->Subject = 'Recibo de compra';
    $outlook_mail->Body    = 'Gracias por tu compra!';
    $outlook_mail->AltBody = 'This is the body in plain text for non-HTML mail clients at https://onlinecode.org/';
    $outlook_mail->AddAttachment('Factura.pdf', '', $encoding = 'base64', $type = 'application/pdf');
     
    if(!$outlook_mail->Send()) {
        echo 'Message could not be sent.';
        echo 'Mailer Error: ' . $outlook_mail->ErrorInfo;
    }
    else {
        echo 'Message of Send email using Outlook SMTP server has been sent';
        $sql = mysqli_query($conn, "DELETE FROM shopping_kart WHERE user_id = '$id'");
        header("location: ../index.php");
    }

?>