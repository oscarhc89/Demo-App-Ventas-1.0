<?php
    
    $mi_pdf = '/opt/lampp/htdocs/ventas/archivos/manualdeusuario.pdf';
    header('Content-type: application/pdf');
    header('Content-Disposition: attachment; filename="'.$mi_pdf.'"');
    readfile($mi_pdf);
    
    ?>