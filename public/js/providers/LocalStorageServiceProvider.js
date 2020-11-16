/**
 * * Provide the LocalStorage Service.
 * @export
 * @class LocalStorageServiceProvider
 */
export class LocalStorageServiceProvider{
    /**
     * * Creates an instance of LocalStorageServiceProvider.
     * @param {object} properties - LocalStorageServiceProvider properties.
     * @param {*} data - Data in the LocalStorage.
     * @memberof LocalStorageServiceProvider
     */
    constructor(properties = {
        name: undefined,
    }, data = undefined){
        this.setProperties(properties);
        this.setStatus();
        this.setData(data);
    }

    /**
     * * Set the LocalStorageServiceProvider properties.
     * @param {object} properties - LocalStorageServiceProvider properties.
     * @memberof LocalStorageServiceProvider
     */
    setProperties(properties = {
        name: undefined,
    }){
        this.properties = {};
        this.setName(properties);
    }

    /**
     * * Set the LocalStorageServiceProvider status.
     * @memberof LocalStorageServiceProvider
     */
    setStatus(){
        this.status = {};
    }

    /**
     * * Set the LocalStorage data.
     * @param {*} data - Data in the LocalStorage.
     * @memberof LocalStorageServiceProvider
     */
    setData(data = undefined){
        this.data = data;
    }

    /**
     * * Set the LocalStorage data name.
     * @param {object} properties - LocalStorageServiceProvider properties.
     * @memberof LocalStorageServiceProvider
     */
    setName(properties = {
        name: undefined,
    }){
        this.properties.name = properties.name;
    }

    /**
     * * Set the LocalStorage warning status.
     * @param {object} status - LocalStorageServiceProvider status.
     * @memberof LocalStorageServiceProvider
     */
    setWarning(status = {
        warning: undefined,
    }){
        this.status.warning = status.warning;
    }

    /**
     * * Get data from the LocalStorage.
     * @static
     * @param {string} name - Name of the data to get.
     * @returns
     * @memberof LocalStorageServiceProvider
     */
    static getData(name = undefined){
        let instance = new this({
            name: name,
        });
        if(localStorage.getItem(name)){
            instance.setData(JSON.parse(localStorage.getItem(name)));
        }else{
            console.error('The "name" attribute is required');
        }
        return instance;
    }

    /**
     * * Set data in the LocalStorage.
     * @static
     * @param {string} name - Name of the data to save.
     * @param {*} data - Data to save.
     * @returns
     * @memberof LocalStorageServiceProvider
     */
    static setData(name = undefined, data = undefined, overwrite = false){
        data = JSON.stringify(data);
        let instance = new this({
            name: name
        }, data);
        if(name != undefined){
            let previousData = false;
            if(this.hasData(name)){
                previousData = true;
            }
            if(previousData){
                if(overwrite){
                    localStorage.setItem(name, data);
                }else{
                    let msg = 'There is previous data in the LocalStorage';
                    instance.setWarning({
                        warning: msg,
                    });
                    console.warn(msg);
                }
            }else{
                localStorage.setItem(name, data);
            }
        }else{
            console.error('The "name" attribute is required');
        }
        return instance;
    }

    /**
     * * Check if LocalStorage has a data.
     * @static
     * @param {string} name - Name of the data to check.
     * @returns
     * @memberof LocalStorageServiceProvider
     */
    static hasData(name = undefined){
        if(name != undefined){
            if(localStorage.getItem(name) !== null){
                return true;
            }else{
                return false;
            }
        }else{
            console.error('The "name" attribute is required');
        }
    }

    /**
     * * Remove a data from LocalStorage.
     * @static
     * @param {string} name - Name of the data to check.
     * @returns
     * @memberof LocalStorageServiceProvider
     */
    static removeData(name = undefined){
        if(name != undefined){
            if(localStorage.removeItem(name) !== null){
                return true;
            }else{
                return false;
            }
        }else{
            console.error('The "name" attribute is required');
        }
    }
}