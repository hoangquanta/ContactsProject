<html>
   <head>
      <title>Mini Project - Contact</title>
      <link href = "https://fonts.googleapis.com/css?family=Arial:100" rel = "stylesheet" type = "text/css">
      <style>
         html, body {
            height: 100%;
         }
         body {
            margin: 0;
            padding: 0;
            width: 100%;
            display: table;
            font-weight: 100;
            font-family: 'Arial';
         }
         .container {
            width: 40%;
            margin: 0 auto;
         }

         .title {
            font-size: 36px;
            text-align: center;
            margin: 100px 0 50px 0;
         }
         .edit-form{
            width: 100%;
         }
         .edit-form input,table,textarea{
            width: 100%;
         }
         .edit-form button{
            width: 150px;
         }
         .edit-form td.submit {
            text-align: center;
         }
         .edit-form .label {
            width: 20%;
         }
      </style>
   </head>
   <body>

      <div class = "container">     
         <div class="title">Manage Contact</div>    
         <div class = "content">
            <form class="edit-form" action = "" method = "post">
               @method('put')
               @csrf
               <table>
                  @php
                      if($name == null) $name = "";
                      if($email == null) $email = "";
                      if($title == null) $title = "";
                      if($content == null) $content = "";
                  @endphp
                  <tr>
                     <td class="label">Name</td>
                     <td><input type = "text" name = "name" value="{{old('name') ?? $name }}"/></td>                     
                  </tr>

                  <tr> 
                     <td class="label">Email</td>
                     <td><input type = "text" name = "email" value="{{old('email') ?? $email }}"/></td>
                  </tr>

                  <tr>
                     <td class="label">Title</td>
                     <td><input type = "text" name = "title" value="{{old('title') ?? $title}}"/></td>
                  </tr>

                  <tr>
                     <td class="label">Content</td>
                     <td>
                        <textarea name="content" rows="5">{{old('content') ?? $content}}</textarea>
                     </td>
                  </tr>
                  
                  <tr>
                     <td></td>
                     <td class="submit">
                        <button type = "submit" style="margin-top: 20px;">Submit</button>
                     </td>
                  </tr>
               </table>
            </form>


            {{-- Error message --}}
               
            @if ($errors->any())
               <div>
                  <ul style="text-decoration: none">
                     @foreach ($errors->all() as $error)
                        <li style="text-align: start; color:red">{{ $error }}</li>
                     @endforeach
                  </ul>
               </div>
            @endif
            <p style="text-align: center; color:red">{{session('statusMessage')}}</p>

         </div>
      </div>
   </body>
</html>