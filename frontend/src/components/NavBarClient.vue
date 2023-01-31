<template>
  <!-- <header>
    <div class="navBar">
      <img class="img_logo" src="../assets/images/logo-only-v2.svg" alt="" />
      <ul>
        <li><router-link to="/">Home</router-link></li>
        <li><router-link to="/Login">Log out</router-link></li>
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
      <router-link class="nav-link " to="/Login">Log out</router-link>
        
      </ul>
    </div>
  </div>
</nav>
</template>

<script>
export default {
  name: "NavBarClient",
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
@media (max-width: 600px) {
  .img_logo {
    width: 50px;
  }
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
      }
    }
    :hover {
        border: 3px solid #68d391;
    }
  }
}

/* From cssbuttons.io by @alexroumi */
button {
  padding: 10px 20px;
  border: unset;
  border-radius: 5px;
  z-index: 1;
  background: white;
  position: relative;
  font-weight: 400;
 
  overflow: hidden;
  color: black;
}

button:hover {
  background-color: #728499;
}
</style>
