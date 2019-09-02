<!DOCTYPE html>
<html lang="en">
<head>
<meta charset="utf-8">
<title>Source Coverage Request</title>

    <link href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-ggOyR0iXCbMQv3Xipma34MD+dH/1fQ784/j6cY/iJTQUOhcWr7x9JvoRxT2MZw1T" crossorigin="anonymous">
    <link rel="stylesheet" href="style.css">

    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.4.1/jquery.min.js"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/js/bootstrap.min.js" integrity="sha384-JjSmVgyd0p3pXB1rRibZUAYoIIy6OrQ6VrjIEaFf/nJGzIxFDsf4x0xIM+B07jRM" crossorigin="anonymous"></script>
  </body>
    <script src="script.js"></script>
    

</head>
<body>
 
    <div class="jumbotron jumbotron-fluid">
  <div class="container">
    <h1 class="display-5 text-center">Source Coverage Request</h1>
        <div class="row justify-content-md-center">
            <div class="col-md-6">
                <form id="source-coverage" method="post" action="display-entry.php" class="needs-validation mt-2" novalidate>
                    <div class="form-group" id="email-group">
                        <label for="email">Your Email:</label>
                        <input type="email" class="form-control" id="email" name="email" aria-describedby="emailHelp" placeholder="Enter email">
                        <div id="emailerror" class="error"></div>
                    </div>
                    <div class="form-group" id="domainname-group">
                        <label for="domainname">Domain Name:</label>
                        <input type="text" class="form-control" id="domainname" name="domainname" placeholder="Enter domain name">
                        <div id="error-domain" class="error"></div>
                    </div>
                    <div class="form-group" id="sourcetype-group">
                        <label for="sourcetype">Source Type:</label>
                        <select name="sourcetype" class="form-control" id="sourcetype" >
                            <option value="news">News</option>
                            <option value="blogs">Blogs</option>
                            <option value="discussions">Discussions</option>
                            <option value="reviews">Reviews</option>
                        </select>

                    </div>
                    <div class="form-group" id="sourcecountry-group">
                        <label for="sourcecountry">Source Country:</label>
                        <select name="sourcecountry" class="form-control" id="sourcecountry">
                            <?php
                             // Get the contents from the countries JSON file 
                            $strJsonFileContents = file_get_contents("names.json");
                            $countries = json_decode($strJsonFileContents, true);
                            foreach($countries as $key => $value) {
                            ?>
                            <option value="<?= $key ?>" title="<?= htmlspecialchars($value) ?>"><?= htmlspecialchars($value) ?></option>
                            <?php
                            }
                            ?>
                            </select>
                    </div>
                    <div class="form-group" id="reason-group">
                        <label for="reason">Reason:</label>
                        <textarea class="form-control" id="reason" name="reason" cols= "50" rows="3"></textarea>
                    </div>
                    <button type="submit" class="btn btn-primary">Submit</button>
                </form>
            </div>
        </div>
    </div>
</div>

    <div class="container mb-3" id="result-container">
        <div class="row justify-content-md-center">
        <div class="col-md-12 table-responsive-lg">
            <table class="table table-striped w-auto">
                <thead class="thead-dark">
                    <tr>
                    <th scope="col">Email</th>
                    <th scope="col">Domain Name</th>
                    <th scope="col">Source Country</th>
                    <th scope="col">Source Type</th>
                    <th scope="col">Reason</th>
                    <th scope="col">Action</th>
                    </tr>
                </thead>
                <tbody id="result">
                </tbody>
            </table>
            </div>
    </div> 
</div>
  
</body>
</html>                            