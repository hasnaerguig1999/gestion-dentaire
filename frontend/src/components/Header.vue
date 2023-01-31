<template>
    <nav class=" navbar navbar-expand-lg navbar-dark bg-dark card-header">
           <div class="container">
                <router-link to="" class="navbar-brand ml-8" href=""><i class="fas fa-home mr-2"></i>Dashboard</router-link>
            <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarsExampleDefault"
                aria-controls="navbarsExampleDefault" aria-expanded="false" aria-label="Toggle navigation">
                <span class="navbar-toggler-icon"></span>
            </button>
            <div class="collapse navbar-collapse" id="navbarsExampleDefault">
                <ul class="navbar-nav ml-auto">
                    <li class="nav-item">
                        <router-link to="about" class="nav-link" href=""><i class="fas fa-users mr-2"></i>User lists </router-link>
                    </li>
                    <li class="nav-item">
                        <router-link to="about" class="nav-link" href=""><i class="fas fa-user-plus mr-2"></i>Add user </router-link>
                    </li>
                    <li class="nav-item">
                        <router-link to="about" class="nav-link" href=""><i class="fab fa-500px mr-2"></i>Profile <span
                                class="sr-only">(current)</span></router-link>
                    </li>
                    <li class="nav-item">
                        <router-link to="about" class="nav-link" href=""><i class="fas fa-sign-out-alt mr-2"></i>Logout</router-link>
                    </li>
                    <li class="nav-item">
                        <router-link to="about" class="nav-link" href=""><i class="fas fa-user-plus mr-2"></i>Register</router-link>
                    </li>
                   
                </ul>
            </div>
           </div>
        </nav>
</template>
<script>
export default {
    name:'Header',
    
}
</script>
<style lang="">
    
</style>