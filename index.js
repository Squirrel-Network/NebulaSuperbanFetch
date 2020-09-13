new Vue({
    el: "#DivSuperBan",
    data() {
        return {
            user_id: [],
            motivation_text: [],
            user_date: [],
            id_operator: []
        }
    },
    mounted: function() {
        axios
            .get('https://hersel.it/apinebula.php')
            .then(response => {
                this.user_id = response.data
                this.motivation_text = response.data
                this.user_date = response.data
                this.id_operator = response.data
            })
            .catch(function (error) {
                console.log(error);
            })
    }
})
