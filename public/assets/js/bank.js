var series = [
    { name: "Company A", product: "A1" },
    { name: "Company A", product: "A2" },
    { name: "Company A", product: "A3" },
    { name: "Company B", product: "B1" },
    { name: "Company B", product: "B2" },
];

$(".company").change(function () {
    var company = $(this).val();
    var options = '<option value=""><strong>Products</strong></option>'; //create your "title" option
    $(series).each(function (index, value) {
        //loop through your elements
        if (value.name == company) {
            //check the company
            options +=
                '<option value="' +
                value.product +
                '">' +
                value.product +
                "</option>"; //add the option element as a string
        }
    });

    $(".product").html(options); //replace the selection's html with the new options
});
