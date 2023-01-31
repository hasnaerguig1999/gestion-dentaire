<template>
  <!-- <header>
    <div class="navBar">
      <img class="img_logo" src="../assets/images/logo-only-v2.svg" alt="" />
      <ul>
        <li><router-link to="/">Home</router-link></li>
        <li><router-link to="/Registre">Registre</router-link></li>
        <li><router-link to="/Login">Login</router-link></li>
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
        <li class="nav-item"><router-link class="nav-link " to="/">Home</router-link></li>
        <li class="nav-item"><router-link class="nav-link " to="/Registre">Registre</router-link></li>
        <li class="nav-item"><router-link class="nav-link " to="/Login">Login</router-link></li>
        
      </ul>
    </div>
  </div>
</nav>

   <!-- <nav class="navbar navbar-expand-lg navbar-light bg-light">
  <div class="container-fluid">
    <a class="navbar-brand" href="#"> <B>Dantaire</B> </a>
    <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
      <span class="navbar-toggler-icon"></span>
    </button>
    <div class="collapse navbar-collapse" id="navbarSupportedContent">
       <ul>
        <li><router-link to="/">Home</router-link></li>
        <li><router-link to="/Registre">Registre</router-link></li>
        <li><router-link to="/Login">Login</router-link></li>
      </ul>
     
    </div>
  </div>
</nav> -->
</template>

<script>
export default {
  name: "NavBarRdv",
  methods: {
    displayButton: () => {
      this.$refs.rdvBtn.style.display = "none";
    },
  },
};
</script>

<!-- Add "scoped" attribute to limit CSS to this component only -->
<style scoped lang="scss">
.navBar {
  display: flex;
  background-color: #8eeca5;
  width: 100%;
  height: 10vh;
  justify-content: space-between;
  padding: 13px 0 12px 0;
}

@media (max-width: 600px) {
  .img_logo {
    width: 50px;
  }
}

.navBar img {
  height: 100%;
  padding-left: 5%;
}

.navBar ul {
      display: flex;
    width: 34%;
    justify-content: space-around;
    align-items: center;
    list-style: none;
    padding-right: 21%;
}

.navBar {
  ul {
    li {
      a {
        text-decoration: none;
        font-family: "Hind", sans-serif;
        color: black;
      }
    }
    :hover {
        border-bottom: 3px solid black;
    }
  }
}

/* From cssbuttons.io by @alexroumi */
button {
  padding: 10px 20px;
  border: unset;
  border-radius: 5px;
  z-index: 1;
  background: rgb(243, 235, 235);
  position: relative;
  font-weight: 400;
  font-size: 16px;
  -webkit-box-shadow: 4px 8px 19px -3px rgba(0, 0, 0, 0.27);
  box-shadow: 4px 8px 19px -3px rgba(0, 0, 0, 0.27);
  transition: all 250ms;
  overflow: hidden;
  color: white;
}

button:hover {
  background-color: #6b8eba;
}
</style>
