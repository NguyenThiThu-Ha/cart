<!DOCTYPE html>
<html>
<head>
<style>

.header {
  float: left;
  display: inline-block;
}

.btn{
  float: right;
  margin-top: 20px;
  margin-right: 10px;
}

#firstrow{
  width: 40%;
}

table {
  border-collapse: collapse;
  width: 100%;
}

th, td {
  text-align: left;
  padding: 8px;
}

td{
  /*height: 80px;*/
}

#des{
  height: 120px;
}
.desinput{
  width: 300px;
  height: 100px;
}

.img_form{
  height: 150px;
}

.imgpre{
  margin-top: 10px;
}


</style>


</head>
<body>
<div class="header">
  <h2>Add</h2>
</div>
<div class="btn">  
  <!-- <button onclick="history.go(-1);">Home </button> -->
  <button onclick="location.href='index.php?controller=posts'">Home </button>
</div>

    <form method="post">
  <table>

    <tr style="background-color: #f2f2f2;">
      <td class="firstcol" id=firstrow>Title</td>
      <td><input type="text" name="title"></td>
    </tr>

    <tr>
      <td class="firstcol" id="des">Description</td>
      <td><input class="desinput" type="text" name="description"></td>
    </tr>

    <tr style="background-color: #f2f2f2;">
      <td class="firstcol">Image</td>
      <td>
        <input id="image_upload" type="file" name="image_upload" onchange="PreviewImage();">
        <div class="imgpre">
          <img id="preview" style="width: 100px; height: 100px;">
        </div>
        
      </td>
    </tr>

    <script type="text/javascript">
      function PreviewImage() {
          var oFReader = new FileReader();
          oFReader.readAsDataURL(document.getElementById("image_upload").files[0]);
          oFReader.onload = function (oFREvent) {
              document.getElementById("preview").src = oFREvent.target.result;
          };
      };
  </script>

    <tr>
      <td class="firstcol">Status</td>
      <td>
        <label for="stt"></label>

        <select name="status" id="status">
          <option value="0">0: Enable</option>
          <option value="1">1: Disable</option>
          
        </select>
      </td>
    </tr>

    <tr style="background-color: #f2f2f2;">
      <td></td>
      <td>  
        <input type="submit" name="submitbtn" value="add">
      </td>
    </tr>

  </table>
</form>

</body>
</html>
