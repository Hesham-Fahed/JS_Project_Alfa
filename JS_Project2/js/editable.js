$(document).ready(function () {
    $('.editBtn').on('click', function () {
        //hide edit span
        $(this).closest("tr").find(".editSpan").hide();

        //show edit input
        $(this).closest("tr").find(".editInput").show();

        //hide edit button
        $(this).closest("tr").find(".editBtn").hide();

        //show edit button
        $(this).closest("tr").find(".saveBtn").show();


        $(this).closest("tr").find(".deleteBtn").hide();

        $(this).closest("tr").find(".confirmBtn").hide();


        $(this).closest("tr").find(".returnbtn").show();

    });

    $('.returnbtn').on('click', function () {
        //hide edit span
        $(this).closest("tr").find(".editSpan").show();

        //show edit input
        $(this).closest("tr").find(".editInput").hide();

        //hide edit button
        $(this).closest("tr").find(".editBtn").show();
        $(this).closest("tr").find(".deleteBtn").show();

        $(this).closest("tr").find(".returnbtn").hide();

        //show edit button
        $(this).closest("tr").find(".saveBtn").hide();

        $(this).closest("tr").find(".confirmBtn").hide();



    });


    $('.saveBtn').on('click', function () {
        var trObj = $(this).closest("tr");

        var ID = $(this).closest("tr").attr('id');
        var inputData = $(this).closest("tr").find(".editInput").serialize();



        // var inputData = Array.from($(this).closest("tr").find(".editInput")).serialize();
        var inputDataToSend = {};
        /*
                inputData.forEach ( el => {
                    inputDataToSend[el.name] = el.value;
                });
                inputDataToSend.id = ID;
                inputDataToSend.action = 'edit';
                //
                console.log(ID);
                console.log(inputDataToSend);
           */

        // The POST-Method does not work - why so ever.
        // So we use an ugly GET
        let myRequest = new Request(
            'userAction.php',
            {
                headers: { 'content-type': 'application/json' },
                method: 'post',
                body: 'action=edit&id=' + ID + '&' + inputData
            }
        )

        // fetch( myRequest ).then(
        fetch('userAction.php?action=edit&id=' + ID + '&' + inputData)
            // .then(
            //   response => response.text(),
            // response => response.json(),
            //  err => console.log("err" + err)
            // ).then(function (data) {



            //  console.log( "data =====" + data);
            //  console.log( "response =====" + response);


            /*  ).then(function(response) {
               response => response.json(), */


            // response => console.log(response),
            .then(response => response.json())
            .then(function (json) {

                //json => console.log(json.data.owner)

                trObj.find(".editSpan.owner").text(json.data.owner);
                trObj.find(".editSpan.address").text(json.data.address);
                trObj.find(".editSpan.email").text(json.data.email);
                trObj.find(".editSpan.description").text(json.data.description);

                trObj.find(".editInput.owner").text(json.data.owner);
                trObj.find(".editInput.address").text(json.data.address);
                trObj.find(".editInput.email").text(json.data.email);
                trObj.find(".editInput.description").text(json.data.description);

                $(this).closest("tr").find(".returnbtn").hide();

                trObj.find(".editInput").hide();
                trObj.find(".saveBtn").hide();
                trObj.find(".editSpan").show();
                trObj.find(".editBtn").show();

                $(this).closest("tr").find(".deleteBtn").show();


                alert(json.data.owner + json.msg);
            });
        /*
                $.ajax({
                    type:'POST',
                    url:,
                    dataType: "json",
                    data:'action=edit&id='+ID+'&'+inputData,
                    contentType: 'application/x-www-form-urlencoded; charset=UTF-8',
                    async : false,
                    success:function(response){
                        if(response.status == 'ok'){
                            trObj.find(".editSpan.owner").text(response.data.owner);
                            trObj.find(".editSpan.address").text(response.data.address);
                            trObj.find(".editSpan.email").text(response.data.email);
                            trObj.find(".editSpan.description").text(response.data.description);
        
                            trObj.find(".editInput.owner").text(response.data.owner);
                            trObj.find(".editInput.address").text(response.data.address);
                            trObj.find(".editInput.email").text(response.data.email);
                            trObj.find(".editInput.description").text(response.data.description);
        
        
                            trObj.find(".editInput").hide();
                            trObj.find(".saveBtn").hide();
                            trObj.find(".editSpan").show();
                            trObj.find(".editBtn").show();
                            alert(response.msg);
        
                        }else{
                            alert(response.msg);
                        }
                    },
                    statusCode : {
                        // Ausgabe für jeden HTTP-Statuscode festlegen 
                        200 : function(data, status, xhr) {
                            console.log('Daten vom Server geladen');
                        }, 
                        304 : function(xhr, status, error) {
                            console.log('Inhalt hat sich seit der letzten Anfrage nicht geändert');
                        }, 
                        404 : function(xhr, status, error) {
                            console.log('Datei nicht gefunden');
                        }
                    }
                });
                */
    });


    $('.addBtn').on('click', function () {
        var trObj = $(this).closest("tr");

        var inputData = $(this).closest("tr").find(".editInput");

        var owner = inputData[0].value;
        var address = inputData[1].value ; 
        var email = inputData[2].value ; 
        var description = inputData[3].value ; 

        const fileInput = ($(this).closest("tr").find(".img"))[0].files[0] ;

        const formData = new FormData();
        
        formData.append('file', fileInput);
        // console.log(formData);
        const options = {
          method: 'POST',
          body: formData,

        };
        
         fetch('userAction.php?action=add&owner='+owner + '&address=' + address + '&email=' + email + '&description=' + description  , options)

        

            .then(response => response.json())
            .then(function (json) {


                trObj.find(".editInput.owner").text("");
                trObj.find(".editInput.address").text("");
                trObj.find(".editInput.email").text("");
                trObj.find(".editInput.description").text("");
                alert( json.msg);
            });
    });


    $('.deleteBtn').on('click', function () {
        //hide delete button
        $(this).closest("tr").find(".deleteBtn").hide();

        $(this).closest("tr").find(".editBtn").hide();

        //show confirm button
        $(this).closest("tr").find(".confirmBtn").show();

        $(this).closest("tr").find(".returnbtn").show();


    });

    $('.confirmBtn').on('click', function () {
        var trObj = $(this).closest("tr");
        var ID = $(this).closest("tr").attr('id');
        $(this).closest("tr").find(".returnbtn").hide();

        $.ajax({
            type: 'POST',
            url: 'userAction.php',
            dataType: "json",
            data: 'action=delete&id=' + ID,
            success: function (response) {
                if (response.status == 'ok') {
                    trObj.remove();
                } else {
                    trObj.find(".confirmBtn").hide();
                    trObj.find(".deleteBtn").show();
                    alert(response.msg);
                }
            }
        });
    });
});