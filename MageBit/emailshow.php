<?php
    //Basic automatic class loader
    include 'includes/autoloader.inc.php';

    //Variables used in code
    $deleteId;
    $inpEmails;

    //Objects
    $emailObj = new emailcontr();
    $emailObj2 = new emailview();
    $emails = new sortemail();
    $mails = $emails->cutEmail();

    //Getting user selected order type
    if(isset($_POST['order'])){
        $results = $emailObj2->getEmailOrder($_POST['order']);
    }else{
        $results = $emailObj2->getEmails();
    }

    //Ordering emails
    if(isset($_POST['orderEmails'])){
        $results = $emailObj2->getEmailD($_POST['orderEmails']);
    }

    //Deleting specific email
    if(isset($_POST["delete"])){
        $emailObj->delEmail($_POST["hiddenval"]);
        header("Location: emailshow.php");
    }

?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Magebit Show Emails</title>
    <style>
        table{
            margin-left: auto;
            margin-right: auto;
            margin-top: 100px;
        }
    </style>
</head>
<body>
    <form method="POST">
        <select name ="order">
            <option>Choose Order Option</option>
            <option value="asc">Ascending</option>
            <option value="desc">Descending</option>
            <option value="dtof">DateOf</option>
        </select>
        <input type="submit"value="Process">
    </form>
    <form method="POST">
        <select name ="orderEmails" >
            <option>Choose Email Style</option>
            <?php
                for($i = 0; $i < count($mails);$i++){  

            ?>
                <option><?php if(isset($mails[$i])) {echo $mails[$i];}?></option>
            <?php
                }
            ?>
        </select>
        <input type="submit" value="Could Not Figure Out" >
    </form>
    <table>
        <thead>
            <th>Email</th>
            <th>Added Date</th>
        </thead>
        <tbody>
                <?php
                    for($i = 0; $i < count($results);$i++){
                        $deleteId = $results[$i]["id"];
                ?>
                <tr>
                    <td><?php echo $results[$i]["email"];?></td>
                    <td><?php echo $results[$i]["email_date"];?></td>
                        <form method="POST">
                            <td><input type="submit" name="delete" value="delete"></td>
                            <td><input type="hidden" value="<?php echo $deleteId;?>" name="hiddenval"></td>
                        </form>
                    
                <?php
                }?>
                </tr>
        </tbody>
    </table>
</body>
</html>