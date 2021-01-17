$(".provinsi").change(function () {
  var baseurl = $("#baseurl").val();
  var id = $(this).val();
  var urel = baseurl + "home/ambilkabupaten";
  $.ajax({
    type: "post",
    url: urel,
    dataType: "html",
    data: "id_provinsi=" + id,
    success: function (msg) {
      //   console.log(msg);
      $("#kabupaten").html(msg).selectpicker("refresh");
      $(".kabupaten").selectpicker("refresh");
    },
  });
});

$(document).ready(function () {
  $(".editBarang").click(function (e) {
    var kao = '<option value=""></option>';
    e.preventDefault();
    var baseurl = $("#baseurl").val();
    var datanya = $(this).attr("href");
    var urel = baseurl + "admin/databarang/" + datanya;
    console.log(urel);
    $.ajax({
      url: urel,
      dataType: "json",
      success: function (msg) {
        console.log(msg);
        $(".namabrg").attr("value", msg["nama"]);
        $(".harga").attr("value", msg["harga"]);
        $(".stok").attr("value", msg["stok"]);
        $(".idbrg").attr("value", msg["id"]);
        $(".gambarlama").attr("value", msg["gambar"]);
        $(".keterangan").html(msg["keterangan"]);
        $(".gambarlabel").html(msg["gambar"]);
        $("#ekategori").html(kao).selectpicker("refresh");
        for (var i = 0; i < msg["kategori"].length; i++) {
          $("#ekategori").append(msg["kategori"][i]).selectpicker("refresh");
          $(".ekategori").selectpicker("refresh");
          $("#editBarang").modal("show");
        }
      },
    });
  });
});
