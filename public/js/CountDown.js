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
    }, event = {
        current: undefined,
        end: undefined,
    }){
        this.setProperties(properties);
        this.setEvent(event);
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
        },
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

    setEvent(event = {
        current: undefined,
        end: undefined,
    }){
        this.event = {};
        this.setCurrentFunction(event);
        this.setEndFunction(event);
    }

    setEndFunction(event = {
        end: undefined,
    }){
        this.event.end = event.end;
    }

    setCurrentFunction(event = {
        current: undefined,
    }){
        this.event.current = event.current;
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
            instance.days = 0;
            instance.hours = 0;
            instance.minutes = 0;
            instance.seconds = 0;
            if(instance.properties.timer.days){
                instance.days = Math.floor(distance / (1000 * 60 * 60 * 24));
            }
            if(instance.properties.timer.hours){
                instance.hours = Math.floor((distance % (1000 * 60 * 60 * 24)) / (1000 * 60 * 60));
                if(!instance.properties.timer.days){
                    instance.hours = Math.floor(distance / (1000 * 60 * 60));
                }
                if(instance.hours.toString().length < 2){
                    instance.hours = `0${instance.hours}`;
                }
            }
            if(instance.properties.timer.minutes){
                instance.minutes = Math.floor((distance % (1000 * 60 * 60)) / (1000 * 60));
                if(instance.minutes.toString().length < 2){
                    instance.minutes = `0${instance.minutes}`;
                }
            }
            if(instance.properties.timer.seconds){
                instance.seconds = Math.floor((distance % (1000 * 60)) / 1000);
                if(instance.seconds.toString().length < 2){
                    instance.seconds = `0${instance.seconds}`;
                }
            }
            instance.event.current(instance);
            if(distance < 0){
                clearInterval(interval);
                instance.event.end(instance);
            }
        });
    }
}