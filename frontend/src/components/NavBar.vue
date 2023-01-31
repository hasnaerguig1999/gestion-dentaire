<template>
  <!-- <header>
    <div class="navBar">
      <img class="img_logo" src="../assets/images/logo-only-v2.svg" alt="" />
      <ul>
        <li><router-link to="/"><a >Home</a> </router-link></li>
        <li><router-link to="/Registre"><a >Registre</a> </router-link></li>
        <li><router-link to="/Login"><a >Login</a> </router-link></li>
        <li>
          <router-link to="/Rendez-vous"
            ><button>Rendez-vous</button></router-link
          >
        </li>
      </ul>
    </div>
  </header> -->
   <nav class="navbar navbar-expand-lg navbar-light bg-light">
  <div class="container-fluid">
    <a class="navbar-brand" href="#"> <B>Dantaire</B> </a>
    <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
      <span class="navbar-toggler-icon"></span>
    </button>
    <div class="collapse navbar-collapse" id="navbarSupportedContent">
      <ul class="navbar-nav me-auto mb-2 mb-lg-0">
        <li class="nav-item">
          <router-link to="/" class="nav-link active">Home</router-link>
        </li>
         <li class="nav-item">
          <router-link to="/Registre" class="nav-link active">Registre</router-link>
        </li>
         <li class="nav-item">
          <router-link to="/Login" class="nav-link active">Login</router-link>
        </li>
         <li>
          <router-link to="/Rendez-vous"> <button>Rendez-vous</button></router-link >
        </li>
        
      </ul>
     
    </div>
  </div>
</nav>


</template>

<script>
export default {
  name: "NavBar",
  methods: {
    
  },
};
</script>

<!-- Add "scoped" attribute to limit CSS to this component only -->
<style scoped lang="scss">
.navBar {
  display: flex;
  background-color: #68d391;
  width: 100%;
  height: 10vh;
  justify-content: space-between;
  padding: 13px 0 12px 0;
}



.navBar img {
  height: 100%;
  padding-left: 5%;
}

.navBar ul {
  display: flex;
  width: 50%;
  justify-content: space-around;
  align-items: center;
  list-style: none;
  padding-right: 5%;
}

.navBar {
  ul {
    li {
      a {
        text-decoration: none;
        font-family: "Hind", sans-serif;
        color: white;
    :hover {
        border: 3px solid #68d391;
    }
      }
    }
  }
}

/* From cssbuttons.io by @alexroumi */
button {
  padding: 10px 20px;
  border: unset;
  border-radius: 5px;
  z-index: 1;
  background: rgb(248, 245, 245);
  // position: relative;
  font-weight: 400;
  font-size: 16px;
  // -webkit-box-shadow: 4px 8px 19px -3px rgba(64, 231, 231, 0.27);
  // box-shadow: 4px 8px 19px -3px rgba(240, 234, 234, 0.27);
  transition: all 250ms;
  overflow: hidden;
  color: black;
}
@media (max-width: 600px) {
  .img_logo {
    width: 50px;
  }
  .navBar {
  ul {
    li {
      a {
       font-size: 20px;
    
      }
    }
  }
 }
 .navBar ul {
  display: flex;
  width: 60%;
  justify-content: space-between;
 
}
  button{
  padding: 5px 3px 5px 3px;
  margin-left: 10px;
  align-items: center;



  }

}


button:hover {
  background-color: #6b8eba;
}
</style>
