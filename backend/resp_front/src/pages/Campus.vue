<template>
    <main>
        <h1>Formulario de registro de campus</h1>
        <br>
        <campusForm/>
    </main>
</template>
<script>
    import campusForm from "../components/forms/CampusForm.vue"
    export default{
        name:'campus',
        components:{
            campusForm
        }
    }
</script>