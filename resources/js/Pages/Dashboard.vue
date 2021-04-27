<template>
    <app-layout>
        <template #header>
            <h2 class="font-semibold text-xl text-gray-800 leading-tight">
                The Survey
            </h2>
        </template>
        <form @submit.prevent="submit">
        <question @answered="saveAnswer" v-for="question in questions.data" :content="question.content" :question_id="question.id"></question>
        <div class="flex justify-center">
        <button type="button" class="p-4 bg-gray-400 rounded font-bold" v-if="questions.current_page !== questions.last_page" @click="nextPage">Next</button>
        <button type="submit" class="p-4 bg-gray-400 rounded font-bold" v-if="questions.current_page === questions.last_page">Done</button>
        </div>
        </form>
        {{form}}
    </app-layout>
</template>

<script>
    import AppLayout from '@/Layouts/AppLayout'
    import Welcome from '@/Jetstream/Welcome'
    import Question from '@/components/Question'
    import Button from "@/Jetstream/Button";
    import { Inertia } from '@inertiajs/inertia'

    export default {
        components: {
            Button,
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
                this.form[val.question_id] =
                    {
                        'question_id': val.question_id,
                        'rating': val.value
                    }
            },
            nextPage()
            {
                Inertia.post('/answers', this.form)
                window.location.href = this.questions.next_page_url

            }
        }
    }
</script>
