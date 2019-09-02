<?php
if (isset($_POST["email"]) && isset($_POST["domainname"]))
{
$email = htmlspecialchars($_POST["email"]);
$domainname = htmlspecialchars($_POST["domainname"]);
$sourcecountry = htmlspecialchars($_POST["sourcecountry"]);
$sourcetype = htmlspecialchars($_POST["sourcetype"]);
$reason = htmlspecialchars($_POST["reason"]);
}
echo "Email :" .$email;
if (isset($_POST["email"]) && isset($_POST["domainname"]))
{?>
    <tr>
      <td><?= $email ?> </td>
      <td><?= $domainname ?></td>
      <td><?= $sourcecountry ?></td>
      <td><?= $sourcetype ?></td>
      <td class="reasonentry"><?= $reason ?></td>
      <td><button class="btn btn-dark" class="delete-entry">Delete</button></td>
    </tr>
<?php 
};
?>