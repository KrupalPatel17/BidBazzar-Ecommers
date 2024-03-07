<?php
$formContent = '<form id="myForm" method="post" action="process_form.php">
                    <label for="name">Name:</label>
                    <input type="text" id="name" name="name"><br>
                    <label for="email">Email:</label>
                    <input type="email" id="email" name="email"><br>
                    <button type="submit">Submit</button>
                </form>';

echo $formContent;
?>
