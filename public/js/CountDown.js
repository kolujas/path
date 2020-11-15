import { FetchServiceProvider } from "./providers/FetchServiceProvider.js";

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
    }, events = {
        current: {
            functionName: function() { console.log('SUCCESS') },
            params: {},
        }, end: {
            functionName: function() { console.log('ERROR') },
            params: {},
        }
    }){
        this.setProperties(properties);
        this.setEvents(events);
        this.getCurrentTime();
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

    setEvents(events = {
        current: {
            functionName: function() { console.log('SUCCESS') },
            params: {},
        }, end: {
            functionName: function() { console.log('ERROR') },
            params: {},
        }
    }){
        this.events = {};
        this.setCurrentFunction(events);
        this.setEndFunction(events);
    }

    setEndFunction(events = {
        current: {
            functionName: function() { console.log('SUCCESS') },
            params: {},
        }
    }){
        this.events.end = {
            functionName: events.end.functionName,
            params: (events.end.params && typeof events.end.params == 'object') ? events.end.params : {},
        };
    }

    setCurrentFunction(events = {
        end: {
            functionName: function() { console.log('ERROR') },
            params: {},
        }
    }){
        this.events.current = {
            functionName: events.current.functionName,
            params: (events.current.params && typeof events.current.params == 'object') ? events.current.params : {},
        };
    }

    /**
     * * Makes the CountDown interval.
     * @memberof CountDown
     */
    makeInterval(){
        let instance = this;
        this.interval = setInterval(function(){
            let distance = instance.properties.scheduled_date_time - (new Date().getTime() + instance.difference);
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
            let params = instance.events.current.params;
            params.countdown = instance;
            instance.events.current.functionName(params);
            if(distance < 0){
                clearInterval(instance.interval);
                params = instance.events.end.params;
                params.countdown = instance;
                instance.events.end.functionName(params);
            }
        });
    }

    /**
     * * Stops the interval.
     * @memberof CountDown
     */
    stop(){
        clearInterval(this.interval);
    }

    async getCurrentTime(){
        let fetchprovider = await FetchServiceProvider.getData(`/api/server/time`);
        let serverTime = new Date(fetchprovider.getResponse('data').now).getTime();
        let clientTime = new Date().getTime();
        this.difference = serverTime - clientTime;
    }
}