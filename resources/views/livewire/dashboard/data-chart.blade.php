<div>
    <script>

        Livewire.on('berhasilUpdate', event => {
            var forUpdate = new Date,
            dformat = [forUpdate.getFullYear(),forUpdate.getMonth()+1, forUpdate.getDate()].join('-')+' '+[forUpdate.getHours(), forUpdate.getMinutes(),forUpdate.getSeconds()].join(':');
            dateCard = new Date(dformat);
            dateCard.setHours(dateCard.getHours()+7);
            var dataAvailabilities = event.availabilities;
            var dataQualities = event.qualities;
            var dataPerformances = event.performances;
            var dataTargets = event.targets;
            
            // RUNNING MACHINE
            const backgroundColor = ['#75B79E','#FF8080'];

            // FOR RUNNING MACHINE HORIZONTAL BAR CHART 1
            runBarData.datasets.length = 0;
            const runningBarMesin1 = dataAvailabilities.filter(ind => ind.mc_id == 1).map(ind => {
                //Change Time to locale
                const createTime = new Date(ind.created_at)
                createTime.setHours(createTime.getHours()-7);
                const updatedTime = new Date(ind.updated_at)
                updatedTime.setHours(updatedTime.getHours()-7);
                //Push Data Run Mesin 1
                if (ind.name == 'RUN') {
                    //Push Data Based on Status 0 (Stop Progress) and 1 (Still Progress)
                    if (ind.status == 0) {
                        const response =   {data:  [[createTime, updatedTime]], label: ind.message, backgroundColor: backgroundColor[ind.status]}
                        runBarData.datasets.push(response)
                    } else {
                        const response =   {data:  [[createTime, dformat]], label: ind.message,  backgroundColor: backgroundColor[ind.status-1]}
                        runBarData.datasets.push(response)
                    }
                //Push Data Stop Mesin 1
                } else {
                    //Push Data Based on Status 0 (Stop Progress) and 1 (Still Progress)
                    if (ind.status == 0) {
                        const response =   {data:  [[createTime, updatedTime]], label: ind.message,backgroundColor: backgroundColor[1]}
                        runBarData.datasets.push(response)
                    } else {
                        const response =   {data:  [[createTime, dformat]], label: ind.message,backgroundColor: backgroundColor[ind.status]}
                        runBarData.datasets.push(response)
                    }  
                }
            });
            RunChart1.update();


            // FOR RUNNING MACHINE HORIZONTAL BAR CHART 2
            runBarData2.datasets.length = 0;
            const barMesin2 = dataAvailabilities.filter(ind => ind.mc_id == 2).map(ind => {
                //Change Time to locale
                const createTime = new Date(ind.created_at)
                createTime.setHours(createTime.getHours()-7);  
                const updatedTime = new Date(ind.updated_at)
                updatedTime.setHours(updatedTime.getHours()-7);

                //Push Data Run Mesin 2
                if (ind.name == 'RUN') {
                    //Push Data Based on Status 0 (Stop Progress) and 1 (Still Progress)
                    if (ind.status == 0) {
                    const response =   {data:  [[createTime, updatedTime]], label: ind.message, backgroundColor: backgroundColor[0]}
                    runBarData2.datasets.push(response)
                    } else {
                    const response =   {data:  [[createTime, dformat]], label: ind.message,  backgroundColor: backgroundColor[0]}
                    runBarData2.datasets.push(response)
                    }
                //Push Data Stop Mesin 2
                } else {
                    //Push Data Based on Status 0 (Stop Progress) and 1 (Still Progress)
                    if (ind.status == 0) {
                    const response =   {data:  [[createTime, updatedTime]], label: ind.message,backgroundColor: backgroundColor[1]}
                    runBarData2.datasets.push(response)
                    } else {
                    const response =   {data:  [[createTime, dformat]], label: ind.message,backgroundColor: backgroundColor[1]}
                    runBarData2.datasets.push(response)
                    }  
                }
            });
            RunChart2.update();

            // Olah Data Untuk AVAILABILITY
            //Card Mesin 1 change date type
            const dataFixFilter1 = dataAvailabilities.filter( val => val.mc_id == 1).map( val => {
                const tgl = new Date(val.created_at)
                tgl.setHours(00);
                tgl.setMinutes(00);
                tgl.setSeconds(00);
                return {tgl: tgl, duration: val.duration, created_at: val.created_at ,mc_id: val.mc_id, message:val.message , name:val.name , status:val.status , updated_at:val.updated_at }
            });

            //Card Mesin 2 change date type
            const dataFixFilter2 = dataAvailabilities.filter( val => val.mc_id == 2).map( val => {
                const tgl = new Date(val.created_at)
                tgl.setHours(00);
                tgl.setMinutes(00);
                tgl.setSeconds(00);
                return {tgl: tgl, duration: val.duration ,created_at: val.created_at, mc_id: val.mc_id, message:val.message , name:val.name , status:val.status , updated_at:val.updated_at }
            });

            //Card Mesin 1 date filtering
            const cardMesin1 = dataFixFilter1.filter(val => String(val.tgl) == String(setDateTimeToday)).map( val => {
                let runtime, stop;
                if(val.name == "RUN") {
                    var sub1 = new Date(val.created_at);
                    var sub2 = new Date(val.updated_at ? val.updated_at : dateCard);
                    runtime = Math.abs(sub2 - sub1); 
                } else {
                    var sub1 =  new Date(val.created_at);
                    var sub2 = new Date(val.updated_at ? val.updated_at : dateCard);
                    stop = Math.abs(sub2 - sub1);
                }
                return { runtime: runtime == undefined ? 0 : runtime, stop: stop == undefined ? 0 : stop}
            });

            //Card Mesin 1 date filtering
            const cardMesin2 = dataFixFilter2.filter(val => String(val.tgl) == String(setDateTimeToday)).map( val => {
                let runtime, stop;
                if(val.name == "RUN") {
                    var sub1 = new Date(val.created_at);
                    var sub2 = new Date(val.updated_at ? val.updated_at : dateCard);
                    runtime = Math.abs(sub2 - sub1); 
                } else {
                    var sub1 =  new Date(val.created_at);
                    var sub2 = new Date(val.updated_at ? val.updated_at : dateCard);
                    stop = Math.abs(sub2 - sub1);
                }
                return { runtime: runtime == undefined ? 0 : runtime, stop: stop == undefined ? 0 : stop}
            });

            //Card Mesin 1 calculating to hour and minute  
            var runMesin1 = cardMesin1.map(val => val.runtime).reduce((acc, val) => acc + val)/60000;
            var runHoursMesin1 = Math.floor(runMesin1/60);
            var runMinutesMesin1 = Math.round(runMesin1%60);
            
            var stopMesin1 = cardMesin1.map(val => val.stop).reduce((acc, val) => acc + val)/60000;
            var stopHoursMesin1 = Math.floor(stopMesin1/60);
            var stopMinutesMesin1 = Math.round(stopMesin1%60);

            //Card Mesin 2 calculating to hour and minute  
            var runMesin2 = cardMesin2.map(val => val.runtime).reduce((acc, val) => acc + val)/60000;
            var runHoursMesin2 = Math.floor(runMesin2/60);
            var runMinutesMesin2 = Math.round(runMesin2%60);
            
            var stopMesin2 = cardMesin2.map(val => val.stop).reduce((acc, val) => acc + val)/60000;
            var stopHoursMesin2 = Math.floor(stopMesin2/60);
            var stopMinutesMesin2 = Math.round(stopMesin2%60);
            
            var totRun = runMesin1+runMesin2;
            var totStop = stopMesin1+stopMesin2;

            //INSERT DATA TO AVAILABILITY
            var x = document.getElementById("mySelect").value;
            //MACHINE 1
            if (x == 1) {
                //INSERT DATA TO AVAILABILITY CARD
                document.getElementById('totAvl').innerText = Math.floor((runMesin1+stopMesin1)/60) +'H:'+Math.floor((runMesin1+stopMesin1)%60)+'M';
                document.getElementById('actAvl').innerHTML = runHoursMesin1+'H:'+runMinutesMesin1+'M';
                document.getElementById('donAvl').innerHTML = stopHoursMesin1+'H:'+stopMinutesMesin1+'M';
                document.getElementById('totAvlAvg').innerText = 'Total Opt Time Machine 1';
                document.getElementById('actAvlAvg').innerText = 'Runtime Machine 1';
                document.getElementById('donAvlAvg').innerText = 'Downtime Machine 1';
                //INSERT DATA TO AVAILABILITY DONUT CHART
                donAvlData.datasets[0].data[0] = runMesin1;
                donAvlData.datasets[0].data[1] = stopMesin1;
                DonutAvl.update();
                //INSERT DATA TO AVAILABILITY BAR CHART
                barAvlData.datasets[0].data[0] = runMesin1+stopMesin1;
                barAvlData.datasets[0].data[1] = runMesin1;
                barAvlData.datasets[0].data[2] = stopMesin1;
                barAvl.update();
            //MACHINE 2
            } else if (x == 2) {
                //INSERT DATA TO AVAILABILITY CARD
                document.getElementById('totAvl').innerText = Math.floor((runMesin2+stopMesin2)/60) +'H:'+Math.floor((runMesin2+stopMesin2)%60)+'M';
                document.getElementById('actAvl').innerHTML = runHoursMesin2+'H:'+runMinutesMesin2+'M';
                document.getElementById('donAvl').innerHTML = stopHoursMesin2+'H:'+stopMinutesMesin2+'M';
                document.getElementById('totAvlAvg').innerText = 'Total Opt Time Machine 2';
                document.getElementById('actAvlAvg').innerText = 'Runtime Machine 2';
                document.getElementById('donAvlAvg').innerText = 'Downtime Machine 2';
                //INSERT DATA TO AVAILABILITY DONUT CHART
                donAvlData.datasets[0].data[0] = runMesin2;
                donAvlData.datasets[0].data[1] = stopMesin2;
                DonutAvl.update();
                //INSERT DATA TO AVAILABILITY BAR CHART
                barAvlData.datasets[0].data[0] = runMesin2+stopMesin2;
                barAvlData.datasets[0].data[1] = runMesin2;
                barAvlData.datasets[0].data[2] = stopMesin2;
                barAvl.update();
            //MACHINE 1 + MACHINE 2
            } else {
                //INSERT DATA TO AVAILABILITY CARD
                document.getElementById('totAvl').innerText = Math.floor(((totRun +totStop)/2)/60)+'H:'+Math.round(((totRun +totStop)/2)%60)+ 'M';
                document.getElementById('actAvl').innerHTML = Math.floor((totRun/2)/60) + 'H:' + Math.round((totRun/2)%60)+'M';
                document.getElementById('donAvl').innerHTML = Math.floor((totStop/2)/60) + 'H:' + Math.round((totStop/2)%60)+'M';
                document.getElementById('totAvlAvg').innerText = 'Average Total Opt Time';
                document.getElementById('actAvlAvg').innerText = 'Average Runtime';
                document.getElementById('donAvlAvg').innerText = 'Average Downtime';
                //INSERT DATA TO AVAILABILITY DONUT CHART
                donAvlData.datasets[0].data[0] = totRun;
                donAvlData.datasets[0].data[1] = totStop;
                DonutAvl.update();
                //INSERT DATA TO AVAILABILITY BAR CHART
                barAvlData.datasets[0].data[0] = runMesin1+runMesin2+stopMesin1+stopMesin2;
                barAvlData.datasets[0].data[1] = runMesin1+runMesin2;
                barAvlData.datasets[0].data[2] = stopMesin1+stopMesin2;
                barAvl.update();
            }

            // INSERT DATA TO QUALITY
            const donutQualityDataOk = dataQualities.filter(val => val.Status == 'OK');
            const donutQualityDataNg = dataQualities.filter(val => val.Status == 'NG');
            //INSERT DATA TO QUALITY CARD
            document.getElementById('totQty').innerText = dataQualities.length;
            document.getElementById('okQty').innerText = donutQualityDataOk.length;
            document.getElementById('ngQty').innerText = donutQualityDataNg.length;
            //INSERT DATA TO QUALITY DONUT CHART
            donQtyData.datasets[0].data[0] = donutQualityDataOk.length;
            donQtyData.datasets[0].data[1] = donutQualityDataNg.length;
            DonutQty.update();
            //INSERT DATA TO QUALITY BAR CHART
            barQtyData.datasets[0].data[0] = dataQualities.length;
            barQtyData.datasets[0].data[1] = donutQualityDataOk.length;
            barQtyData.datasets[0].data[2] = donutQualityDataNg.length;
            barQty.update();

            //INSERT DATA TO PERFORMANCE CARD
            document.getElementById('tarPrf').innerText = dataTargets[0].TARGET;
            document.getElementById('actPrf').innerText = dataPerformances.length;
            document.getElementById('perPrf').innerHTML = Number(dataPerformances.length/dataTargets[0].TARGET*100).toFixed(2) + '%';
            //INSERT DATA TO PERFORMANCE DONUT CHART
            if (dataPerformances.length < dataTargets[0].TARGET) {
                donPerData.datasets[0].data[1] = dataTargets[0].TARGET-dataPerformances.length; //target
            } else {
                    donPerData.datasets[0].data[1] = 0; //target
                }
            // donPerData.datasets[0].data[1] = dataTargets[0].TARGET-dataPerformances.length; //target
            donPerData.datasets[0].data[0] = dataPerformances.length; //actual
            DonutPer.update();
            //INSERT DATA TO PERFORMANCE BAR CHART (ACTUAL)
            barPerData.datasets[1].data = [];
            const indexActualPerfBar = dataPerformances.map((val,ind) => {
                const response = {x:val.timestamp, y:ind+1};
                barPerData.datasets[1].data.push(response);
            });
            //INSERT DATA TO PERFORMANCE BAR CHART (TARGET)
            barPerData.datasets[0].data = [];
            const indexTargetPerfBar = dataTargets.map((val,ind) => {
                const response = {x:val.timestamp, y:val.TARGET};
                // console.log(response);
                barPerData.datasets[0].data.push(response);
            });
            barPer.update();
            
            //OEE DONUT CHART
            let oeeDonutChart = (Number(donPerData.datasets[0].data[0]/(donPerData.datasets[0].data[1]+donPerData.datasets[0].data[0])*100).toFixed(2))*(Number(donQtyData.datasets[0].data[0]/(donQtyData.datasets[0].data[0]+donQtyData.datasets[0].data[1])*100).toFixed(2))*(Number(donAvlData.datasets[0].data[0]/(donAvlData.datasets[0].data[0]+donAvlData.datasets[0].data[1])*100).toFixed(2))/10000;
            // console.log(oeeDonutChart)
            OEEData.datasets[0].data[0] = oeeDonutChart; 
            if (OEEData.datasets[0].data[0] < 100) {
                OEEData.datasets[0].data[1] = 100 - oeeDonutChart;
            } else {
                OEEData.datasets[0].data[1] = 0;
            }
            myChart.update();
        });
    </script>
</div>
