new Vue({
    el: "#DivSuperBan",
    data() {
        return {
            user_id: [],
            motivation_text: [],
            user_date: []
        }
    },
    mounted: function() {
        axios
            .get('https://hersel.it/apinebula.php')
            .then(response => {
                this.user_id = response.data
                this.motivation_text = response.data
                this.user_date = response.data
            })
            .catch(function (error) {
                console.log(error);
            })
    }
})
