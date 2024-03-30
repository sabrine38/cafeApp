<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Document</title>
    <style>
        .form {
  display: flex;
  flex-direction: column;
  gap: 10px;
  max-width: 350px;
  background-color: #fff;
  padding: 20px;
  border-radius: 20px;
  position: relative;
}

.title {
  font-size: 28px;
  color: #C6A969;
  font-weight: 600;
  letter-spacing: -1px;
  position: relative;
  display: flex;
  align-items: center;
  padding-left: 30px;
}

.title::before,.title::after {
  position: absolute;
  content: "";
  height: 16px;
  width: 16px;
  border-radius: 50%;
  left: 0px;
  background-color: #C6A969;
}

.title::before {
  width: 18px;
  height: 18px;
  background-color: #B19470;
}

.title::after {
  width: 18px;
  height: 18px;
  animation: pulse 1s linear infinite;
}

.message, .signin {
  color: rgba(88, 87, 87, 0.822);
  font-size: 14px;
  margin-top: -5%;
}

.signin {
  text-align: center;
}

.signin a {
  color: royalblue;
}

.signin a:hover {
  text-decoration: underline royalblue;
}

.flex {
  display: flex;
  width: 100%;
  gap: 6px;
}

.form label {
  position: relative;
}

.form label .input {
  width: 100%;
  padding: 10px 10px 20px 10px;
  outline: 0;
  border: 1px solid rgba(105, 105, 105, 0.397);
  border-radius: 10px;
}

.form label .input + span {
  position: absolute;
  left: 10px;
  top: 15px;
  color: grey;
  font-size: 0.9em;
  cursor: text;
  transition: 0.3s ease;
}

.form label .input:placeholder-shown + span {
  top: 15px;
  font-size: 0.9em;
}

.form label .input:focus + span,.form label .input:valid + span {
  top: 30px;
  font-size: 0.7em;
  font-weight: 600;
}

.form label .input:valid + span {
  color: rgb(223, 204, 33);
}

.submit {
  border: none;
  outline: none;
  background-color: #C6A969;
  padding: 10px;
  border-radius: 10px;
  color: #fff;
  font-size: 16px;
  transform: .3s ease;
}

.submit:hover {
  background-color: #644501;
}

@keyframes pulse {
  from {
    transform: scale(0.9);
    opacity: 1;
  }

  to {
    transform: scale(1.8);
    opacity: 0;
  }
}
    </style>
</head>
<body>

      <div>
        @if(session('success'))
        <div class="alert alert-success">{{ session('success') }}</div>
    @endif
      </div>
    <form class="form" action="{{ route('SuperAdmin.store') }}" method="POST" style="margin-left: 30%;">
        @csrf
        <p class="title">Ajouter vendeur </p>
        <p class="message" >Signup now and get full access to our app. </p>

            <div class="flex" >
            <label>
                <input required="" placeholder="" type="text" class="input" name="nom">
                <span>Nom</span>
            </label>
    
            <label>
                <input required="" placeholder="" type="text" class="input"  name="prenom">
                <span>Prénom</span>
            </label>
        </div>  
                
        <label>
            <input required="" placeholder="" type="email" class="input" name="email">
            <span>Email</span>
        </label> 
            
        <label>
            <input required="" placeholder="" type="password" class="input" name="motpass">
            <span>Password</span>
        </label>
        <label>
            <input required="" placeholder="" type="password" class="input" name="Confirm_mot_de_pass">
            <span>Confirm password</span>
        </label>
        <label>
            <input required="" placeholder="" type="text" class="input"  name="telephone">
            <span>tele</span>
        </label>
        <label>
            <input required="" placeholder="" type="text" class="input"  name="adress">
            <span>Adress</span>
        </label>
        <label>
            <input required="" placeholder="" type="file" class="input"  name="image">
            <span>image</span>
        </label>
        <label>
            <input required="" placeholder="" type="text" class="input"  name="type_utilisateur">
            <span>type_utilisateur</span> 
        </label>
       <!-- <label>
            <select required name="super_admin_id" class="input">
                <option value="">Sélectionnez l'administrateur super</option>
                @foreach($superAdmins as $superAdmin)
                    <option value="{{ $superAdmin->id }}">{{ $superAdmin->nomS }} {{ $superAdmin->prenomS }}</option>
                @endforeach
            </select>
            <span>id-Admin</span>
        </label>-->
        
        <button type="submit" class="submit">Submit</button>
        
    </form>    
</body>
</html>