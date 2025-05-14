<html>
<head>
<title> Custom Form Kit </title>
</head>
<body>
<center>

<form method="post" name="redirect" action="https://test.ccavenue.com/transaction/transaction.do?command=initiateTransaction"> 
	<input type="hidden" name="encRequest" value="<?php echo e($encrypted_data); ?>">
	<input type="hidden" name="access_code" value="<?php echo e($access_code); ?>">
</form>
</center>
<script language='javascript'>document.redirect.submit();</script>
</body>
</html>

<?php /**PATH C:\xampp\htdocs\resources\views\backEnd\global\ccAve2.blade.php ENDPATH**/ ?>