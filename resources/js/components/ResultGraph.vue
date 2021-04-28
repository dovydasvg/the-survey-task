<script>
import { Bar } from 'vue3-chart-v2'

export default {
    name: "ResultGraph",
    extends: Bar,
    props: [
        'question',
        'user_rating',
        'average_rating',
        'total_answers'
    ],
    mounted () {
        this.renderChart({
            labels: ['Your Answer', 'Average Answer'],
            datasets: [
                {
                    label: this.question,
                    backgroundColor: '#f87979',
                    data: [this.user_rating, this.average_rating],

                }
            ]

        }, {
            title:{
              display:true,
              text: 'Answered by: ' + this.total_answers + ' people.'
            },
            scales: {
                yAxes: [{
                    ticks: {
                        beginAtZero: true,
                        suggestedMax:5,
                        stepSize: 1,
                        precision: 5
                    }
                }]
            }
        })
    }
}
</script>

<style scoped>

</style>
