<template>
    <app-layout>
        <template #header>
            <h2 class="font-semibold text-xl text-gray-800 leading-tight">
                Users
            </h2>
        </template>
        <ul>
            <user v-for="user in users">{{user.email}}</user>
        </ul>

    </app-layout>
</template>

<script>
import AppLayout from "@/Layouts/AppLayout";
import User from "@/components/User";

export default {
    name: "Users",
    //Getting only users that didn't finish the survey
    props:[
        'users',
    ],
    components:{
        AppLayout,
        User
    }
}
</script>

<style scoped>

</style>
