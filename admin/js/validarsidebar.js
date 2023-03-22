$(document).ready(function(){

    //Agregar Cliente
    var cliente = $("#cliente");
    // Lista Clientes
    var lista_cliente = $("#lista_cliente");
    //Prefacturas
    var prefacturas = $("#prefactura");
    //Servicios
    var servicios = $("#servicios");
    //Paginas
    var paginas = $("#paginas");
    // //Citas
    var citas = $("#citas");
    // //Reporte
    var reporte = $("#reportes");
    // //Busqueda
    var busqueda = $("#busqueda");
    // //Agregar Usuario
    var add_user = $("#add_user");
    //Agregar Barbero
    var add_barber = $("#add_barber");

    // let n = $('.user-name #rol').text();

   if ($('.user-name #rol').text()=="admin") {
        
   } else {
    servicios.addClass(' hidden');
    paginas.addClass(' hidden');
    citas.addClass(' hidden');
    reporte.addClass(' hidden');
    busqueda.addClass(' hidden');
    add_user.addClass(' hidden');
    add_barber.addClass(' hidden');
  
   }
   
  });