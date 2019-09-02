$(document).ready(function(){
    $("form#source-coverage").submit(function(event){
            event.preventDefault();
            
            var actionFile = $(this).attr("action");
            var formValues = $(this).serialize();
        
            //domain name
            //check if domain is TLD - from https://data.iana.org/TLD/tlds-alpha-by-domain.txt
                    var domainname = $("input#domainname").val();
                    function isValidDomain(domainname) {
                    if (!domainname) return false;
                    var re = /^(?!:\/\/)([a-zA-Z0-9-]+\.){0,5}[a-zA-Z0-9-][a-zA-Z0-9-]+\.[a-zA-Z]{2,64}?$/gi;
                    return re.test(domainname);
                    }
                    isValidDomain(domainname);
    
             //check email format
                    var emailadd = $("input#email").val();
                    function isValidEmail(emailadd){
                    if (!emailadd) return false;
                    var re = /^[a-zA-Z0-9.!#$%&'*+/=?^_`{|}~-]+@[a-zA-Z0-9-]+(?:\.[a-zA-Z0-9-]+)*$/;
                    return re.test(emailadd);
                    }
                    isValidEmail(emailadd);
    
              //if validation ok, post form
                if (isValidDomain(domainname) == false || (domainname == "")){
                    $("#error-domain").html("* Please enter valid TLD domain name");
                    var errorcount = 1;
                }else{
                    $("#error-domain").hide();
                }

                if(isValidEmail(emailadd) == false || (emailadd == ""))
                {
                    $("#emailerror").html("* Please enter valid email address");
                    var errorcount = 1;
                }else{
                    $("#emailerror").hide();
                }

                if(errorcount !== 1)
                {
                //show result-container
                $("#result-container").show();
                // Send the form data using post
                $.post(actionFile, formValues, function(data){
                    // Display the returned data in browser
                    $("#result").append(data);                    
                    });
                    
                }
        });
        
   //delete entry
        $( "#result" ).on( "click", "button", function( event ) {
            event.preventDefault();
           
            var trcount =  $(this).parents('tr').length;
            if ($(this).parents('tr').is(':only-child')){
                $("#result-container").hide();
                $(this).parents('tr').remove();
            }else{
                $(this).parents('tr').remove();
            }
        });
      
    });
    
