<!doctype html>
<html lang="es">
<head>
  <meta charset="UTF-8">
  <title>Dashboard</title>
  <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet">
  <link href="https://cdn.jsdelivr.net/npm/bootstrap-icons/font/bootstrap-icons.css" rel="stylesheet">
<!-- Librerías -->
<script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/html2canvas/1.4.1/html2canvas.min.js"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/jspdf/2.5.1/jspdf.umd.min.js"></script>

</head>
<body>

<!-- Contenido a convertir -->
<div id="toPdf" style="width:600px; padding:20px; background:#f9f9f9; border:1px solid #ccc;">
  <h2>Reporte de prueba</h2>
  <p>Este es el contenido que se convertirá en PDF y se mostrará aquí mismo.</p>
</div>

<!-- Botón -->
<button id="btnPreview">Generar y ver PDF</button>

<!-- Contenedor para visualizar el PDF -->
<div id="pdfPreview" style="margin-top:20px; border:1px solid #ccc; height:600px;">
  <!-- Aquí insertaremos el iframe con el PDF -->
</div>

<script>
$(function(){
  $('#btnPreview').click(async function(){
    const { jsPDF } = window.jspdf;

    const elem = document.getElementById('toPdf');
    const canvas = await html2canvas(elem, { scale: 4 });
    const imgData = canvas.toDataURL('image/png');

    const pdf = new jsPDF('p','mm','a4');
    const pageWidth = 210;
    const pageHeight = 297;

    const imgWidth = pageWidth;
    const imgHeight = (canvas.height * imgWidth) / canvas.width;

    pdf.addImage(imgData, 'PNG', 0, 0, imgWidth, imgHeight);

    // generar blob
    const pdfBlob = pdf.output('blob');

    // crear URL temporal
    const pdfUrl = URL.createObjectURL(pdfBlob);

    // insertar iframe en el contenedor
    $('#pdfPreview').html(
      `<iframe src="${pdfUrl}" width="100%" height="100%" style="border:none;"></iframe>`
    );
  });
});
</script>

</body>
</html>
