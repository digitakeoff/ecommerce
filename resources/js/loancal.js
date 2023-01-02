export default () => ({
    vehicle_price:'',
    interest_rate:'',
    down_payment:'',
    period_month:'',

    monthly_payment: 0,
    total_interest_payment: 0,
    total_amount_to_pay: 0,

    validation_errors: true,

    init(){
        this.vehicle_price = car.price||''
        this.interest_rate = 2.5
        this.down_payment = .3 * car.price
        this.period_month = 1

    },

    calculatePayment()
	{
        if(isNaN(this.vehicle_price)){
            this.validation_errors = true;
        } else if (isNaN(this.interest_rate)) {
            validation_errors = true;
        } else if (isNaN(this.period_month)) {
            this.validation_errors = true;
        } else if (isNaN(this.down_payment)) {
            this.validation_errors = true;
        } else if (this.down_payment > this.vehicle_price) {
            this.validation_errors = true;
        } else {
            this.validation_errors = false;
        }


        if(!this.validation_errors){
            let princ = this.vehicle_price - this.down_payment;
            let intRate = (this.interest_rate/100) / 12;
            let months = this.period_month * 12;
            let monthly_payment = Math.floor((princ*intRate)/(1-Math.pow(1+intRate,(-1*months)))*100)/100;
            this.monthly_payment = Math.ceil(monthly_payment);
                
            this.total_amount_to_pay = Math.ceil(parseFloat(this.down_payment) + parseFloat(this.monthly_payment * months))
            this.total_interest_payment = Math.ceil(this.total_amount_to_pay - this.vehicle_price)
        }
	},

    onChangeAmt(){
        // if(isNaN(this.vehicle_price)){
        //     this.validation_errors = true;
        // } else if (isNaN(this.interest_rate)) {
        //     this.validation_errors = true;
        // } else if (isNaN(this.period_month)) {
        //     this.validation_errors = true;
        // } else if (isNaN(this.down_payment)) {
        //     this.validation_errors = true;
        // } else if (this.down_payment > this.vehicle_price) {
        //     this.validation_errors = true;
        // } else {
        //     validation_errors = false;
        // }

        let interest_rate = this.interest_rate/1200

        let interest_rate_unused = interest_rate

        if(interest_rate == 0) {
            interest_rate_unused = 1
        }

        this.monthly_payment = (this.vehicle_price - this.down_payment) * interest_rate_unused * Math.pow(1 + interest_rate, this.period_month)

        let monthly_payment_div = ((Math.pow(1 + interest_rate, this.period_month)) - 1)

        if(monthly_payment_div == 0) {
            monthly_payment_div = 1
        }

        this.monthly_payment = this.monthly_payment/monthly_payment_div
        this.monthly_payment = Math.ceil(this.monthly_payment)

        this.total_amount_to_pay = this.down_payment + (this.monthly_payment * this.period_month)
        this.total_amount_to_pay = Math.ceil(this.total_amount_to_pay)

        this.total_interest_payment = this.total_amount_to_pay - this.vehicle_price
        this.total_interest_payment = Math.ceil(this.total_interest_payment)
    }

})