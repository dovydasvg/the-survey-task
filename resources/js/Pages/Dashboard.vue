<template>
    <app-layout>
        <template #header>
            <h2 class="font-semibold text-xl text-gray-800 leading-tight">
                The Survey
            </h2>
        </template>
        <form @submit.prevent="submit">
        <question @answered="saveAnswer" v-for="question in questions.data" :content="question.content" :question_id="question.id"></question>
        <button type="button" v-if="questions.current_page !== questions.last_page" @click="nextPage">Next</button>
        </form>
        {{questions}}
    </app-layout>
</template>

<script>
    import AppLayout from '@/Layouts/AppLayout'
    import Welcome from '@/Jetstream/Welcome'
    import Question from '@/components/Question'

    export default {
        components: {
            AppLayout,
            Welcome,
            Question
        },
        props: [
            'questions',
        ],
        data: function () {
            return{
                //Keys: Question ID; Value: Answer;
                form: {}
            }
        },
        methods:{
            submit()
            {
                console.log(this.form)
            },
            saveAnswer(val)
            {
                this.form[val.question_id] = val.value
            },
            newPage()
            {

            }
        }
    }
</script>
