<template>
<app-layout>
    <template #header>
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            Results
        </h2>
    </template>
    <div class="grid grid-cols-1 justify-items-center">
    <ResultGraph v-for="result in results" :id="result.question" :question="result.question" :user_rating="result.user_rating" :average_rating="result.average_rating" :total_answers="result.total_answers" class="w-1/2"></ResultGraph>
    </div>

</app-layout>
</template>

<script>
import AppLayout from "@/Layouts/AppLayout";
import ResultGraph from "@/components/ResultGraph";

export default {
    name: "Results",
    components: {ResultGraph, AppLayout},
    props:{
        results:[]
    }
}
</script>

<style scoped>



</style>
