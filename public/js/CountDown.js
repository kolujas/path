/**
 * * CountDown makes an excellent count down.
 * @export
 * @class CountDown
 */
export class CountDown{
    /**
     * * Creates an instance of CountDown.
     * @param {object} properties - CountDown properties.
     * @param {HTMLElement} html - CountDown HTML Element.
     * @memberof CountDown
     */
    constructor(properties = {
        scheduled_date_time: null,
        timer: {
            year: true,
            month: true,
            day: true,
            hours: true,
            minutes: true,
            seconds: true,
        }, message: 'Expired scheduled date time'
    }, html = undefined){
        this.setProperties(properties);
        this.setHTML(html);
        this.makeInterval();
    }

    /**
     * * Set the CountDown properties.
     * @param {object} properties - CountDown properties.
     * @memberof CountDown
     */
    setProperties(properties = {
        scheduled_date_time: null,
        timer: {
            year: true,
            month: true,
            day: true,
            hours: true,
            minutes: true,
            seconds: true,
        }, message: 'Expired scheduled date time'
    }){
        this.properties = {};
        this.setScheduledDateTime(properties);
        this.setTimer(properties);
    }

    /**
     * * Set the CountDown scheduled date time.
     * @param {object} properties - CountDown properties.
     * @memberof CountDown
     */
    setScheduledDateTime(properties = {
        scheduled_date_time: null
    }){
        this.properties.scheduled_date_time = new Date(properties.scheduled_date_time).getTime();
    }

    /**
     * * Set the CountDown timer properties.
     * @param {object} properties - CountDown properties.
     * @memberof CountDown
     */
    setTimer(properties = {
        timer: {
            years: true,
            months: true,
            days: true,
            hours: true,
            minutes: true,
            seconds: true,
        }
    }){
        this.properties.timer = properties.timer;
    }

    /**
     * * Set the CountDown expired message.
     * @param {object} properties - CountDown properties.
     * @memberof CountDown
     */
    setMessage(properties = {
        message: 'Expired scheduled date time'
    }){
        this.properties.message = properties.message;
    }

    /**
     * * Set the CountDown HTML Element.
     * @param {HTMLElement} html - CountDown HTML Element.
     * @memberof CountDown
     */
    setHTML(html = undefined){
        this.html = html;
    }

    /**
     * * Makes the CountDown interval.
     * @memberof CountDown
     */
    makeInterval(){
        let instance = this;
        let interval = setInterval(function(){
            let now = new Date().getTime();
            let distance = instance.properties.scheduled_date_time - now;
            let days = 0, hours = 0, minutes = 0, seconds = 0;
            if(instance.properties.timer.days){
                days = Math.floor(distance / (1000 * 60 * 60 * 24));
            }
            if(instance.properties.timer.hours){
                hours = Math.floor((distance % (1000 * 60 * 60 * 24)) / (1000 * 60 * 60));
                if(hours.toString().length < 2){
                    hours = `0${hours}`;
                }
            }
            if(instance.properties.timer.minutes){
                minutes = Math.floor((distance % (1000 * 60 * 60)) / (1000 * 60));
                if(minutes.toString().length < 2){
                    minutes = `0${minutes}`;
                }
            }
            if(instance.properties.timer.seconds){
                seconds = Math.floor((distance % (1000 * 60)) / 1000);
                if(seconds.toString().length < 2){
                    seconds = `0${seconds}`;
                }
            }
            instance.html.innerHTML = `${days}d ${hours}:${minutes}:${seconds}`;
            if(distance < 0){
                clearInterval(interval);
                instance.html.innerHTML = instance.properties.message;
            }
        });
    }
}