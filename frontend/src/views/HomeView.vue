<template>
<NavBar />
  <div class="galerie">
     
        <!-- <img src="../assets/images/description-1.svg" alt=""> -->
        <img class="imge1" src="../assets/images/visa.jpeg" alt="">
      
    </div>
    <div class="main">
        <!-- <h2>Exceptional</h2> -->
        <div class="title">Visa</div>
        <p>Trouvez votre visa et prenez un rendez-vous. C'est gratuit, simple, et disponible 24/7
   Optimisez l'activité de votre voyage  grâce aux merveilles du Digital..</p>
    </div>
    <div class="galerie">
        <!-- <img src="../assets/images/1.svg" alt=""> -->
        <img class="imge2" src="../assets/images/visa.jpeg" alt="">
        <!-- <img src="../assets/images/3.svg" alt=""> -->
        
      
    </div>
    <Foot />
</template>




<script>

import NavBar from '../components/NavBar.vue';
import Foot from '../components/Foot.vue';
// import Cookies from 'vue-cookies';

export default{
  name: "HomeView",
  components: {
    NavBar,
    Foot,
  },

};


</script>


<style lang="scss">

/* galerie  */


.galerie {
    height: auto;
    width: 100%;
    display: grid;
    grid-template-columns: auto auto auto;
}


.galerie .imge1 {
    height: 70%;
    width: 100%;
    background-color: white;
    text-align: center;
    margin-top: 20px;
    //  display: block;
  // margin-left: 50%;
  // margin-right: auto;
}
.galerie .imge2 {
    height: 70%;
    width: 90%;
    background-color: white;
    text-align: center;
    margin-top: 20px;
    //  display: block;
   margin-left: 50%;

  margin-right: auto;
}

/* main */

.main{
    padding: 0 10% 0 10%;
    margin-top: 2%;
    margin-bottom: 3%;
}
.main p{
    margin-top: 1%;
    color: #a6a6a6;
    line-height: 30px;
}
.main .title{
    margin-top: 20%;
    // font-family: 'Parisienne';
    font-size: 25px;
    color: #68d391;
}
@media all and (max-width: 767px) {

    
.galerie .imge1 {
    height: 70%;
    width: 100%;
    background-color: white;
    text-align: center;
    margin-top: 20px;
    //  display: block;
  // margin-left: 15%;
  // margin-right: auto;
}

.galerie .imge2 {
    height: 60%;
    width: 70%;
  
    //  display: block;
  margin-left: 50%;
  margin-right: auto;
}

}



</style>
