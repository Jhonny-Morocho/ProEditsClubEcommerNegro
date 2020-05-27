
<div id="myButton"></div>

<link rel="stylesheet" href="../Wassap/floating-wpp.css">
<script type="text/javascript" src="../Wassap/floating-wpp.js"></script>
<script type="text/javascript">
    $(function () {
        $('#myButton').floatingWhatsApp({
            phone: '+593998202201',
            popupMessage: 'Hola, Somos ProeditsClub en que podemos ayudarte?',
        

            message: "Yo' Tengo una consulta ",
            showPopup: true,
            showOnIE: false,
            headerTitle: 'Welcome!',
            headerColor: 'green',
            backgroundColor: 'crimson',
            buttonImage: '<img src="../Wassap/whatsapp.svg" />'
        });
    });
</script>