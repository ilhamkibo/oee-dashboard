<div>
    <script>

        Livewire.on('berhasilUpdate', event => {
            var forUpdate = new Date,
            dformat = [forUpdate.getFullYear(),forUpdate.getMonth()+1, forUpdate.getDate()].join('-')+' '+[forUpdate.getHours(), forUpdate.getMinutes(),forUpdate.getSeconds()].join(':');
            dateCard = new Date(dformat);
            dateCard.setHours(dateCard.getHours()+7);
            var dataFix = event.availabilities;
            var dataFix2 = event.qualities;
            var dataFix3 = event.performances;
            var dataFix4 = event.targets;
            // console.log(event)

            
            // RUNNING MACHINE
            const backgroundColor = ['#75B79E','#FF8080'];

            // FOR RUNNING MACHINE HORIZONTAL BAR CHART 1
            runBarData.datasets.length = 0;
            const barMesin1 = dataFix.filter(ind => ind.mc_id == 1).map(ind => {
                const dibuat = new Date(ind.created_at)
                dibuat.setHours(dibuat.getHours()-7);
                const dibarui = new Date(ind.updated_at)
                dibarui.setHours(dibarui.getHours()-7);
                // console.log(dibarui);
                // console.log(dibuat);
                if (ind.name == 'RUN') {
                    // console.log(ind.status)
                    if (ind.status == 0) {
                        const response =   {data:  [[dibuat, dibarui]], label: ind.message, backgroundColor: backgroundColor[ind.status]}
                    // return response
                    runBarData.datasets.push(response)
                    } else {
                    const response =   {data:  [[dibuat, dformat]], label: ind.message,  backgroundColor: backgroundColor[ind.status-1]}
                    runBarData.datasets.push(response)
                    }
                } else {
                    if (ind.status == 0) {
                    const response =   {data:  [[dibuat, dibarui]], label: ind.message,backgroundColor: backgroundColor[1]}

                    // return response
                    runBarData.datasets.push(response)
                    } else {
                    const response =   {data:  [[dibuat, dformat]], label: ind.message,backgroundColor: backgroundColor[ind.status]}
                    runBarData.datasets.push(response)
                    }  
                }
            });
            RunChart1.update();


            // FOR RUNNING MACHINE HORIZONTAL BAR CHART 2
            runBarData2.datasets.length = 0;
            const barMesin2 = dataFix.filter(ind => ind.mc_id == 2).map(ind => {
                const dibuat = new Date(ind.created_at)
                dibuat.setHours(dibuat.getHours()-7);
                
                const dibarui = new Date(ind.updated_at)
                dibarui.setHours(dibarui.getHours()-7);
                
                if (ind.name == 'RUN') {
                    // console.log(ind.status)
                    if (ind.status == 0) {
                    // console.log(dibarui);
                    // console.log(dibuat);
                    const response =   {data:  [[dibuat, dibarui]], label: ind.message, backgroundColor: backgroundColor[0]}
                    // return response
                    runBarData2.datasets.push(response)
                    // console.log(runBarData2.datasets)
                    } else {
                    const response =   {data:  [[dibuat, dformat]], label: ind.message,  backgroundColor: backgroundColor[0]}
                    runBarData2.datasets.push(response)
                    }
                } else {
                    if (ind.status == 0) {
                    const response =   {data:  [[dibuat, dibarui]], label: ind.message,backgroundColor: backgroundColor[1]}

                    // return response
                    runBarData2.datasets.push(response)
                    } else {
                    const response =   {data:  [[dibuat, dformat]], label: ind.message,backgroundColor: backgroundColor[1]}
                    runBarData2.datasets.push(response)
                    }  
                }
            });
            RunChart2.update();

            // Olah Data Untuk AVAILABILITY
            //Card Mesin 1
            const dataFixFilter1 = dataFix.filter( val => val.mc_id == 1).map( val => {
                const tgl = new Date(val.created_at)
                tgl.setHours(00);
                tgl.setMinutes(00);
                tgl.setSeconds(00);
                
                return {tgl: tgl, duration: val.duration, created_at: val.created_at ,mc_id: val.mc_id, message:val.message , name:val.name , status:val.status , updated_at:val.updated_at }
            })

            const dataFixFilter2 = dataFix.filter( val => val.mc_id == 2).map( val => {
                const tgl = new Date(val.created_at)
                tgl.setHours(00);
                tgl.setMinutes(00);
                tgl.setSeconds(00);
                
                return {tgl: tgl, duration: val.duration ,created_at: val.created_at, mc_id: val.mc_id, message:val.message , name:val.name , status:val.status , updated_at:val.updated_at }
            })

            const cardMesin1 = dataFixFilter1.filter(val => String(val.tgl) == String(ddate4)).map( val => {
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

            const cardMesin2 = dataFixFilter2.filter(val => String(val.tgl) == String(ddate4)).map( val => {
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

            // const cardMesin1 = dataFix.filter(val => val.mc_id == 1).map(val => {
            //     let runtime, stop;
            //     if(val.name == "RUN") {
            //         var sub1 = new Date(val.created_at);
            //         var sub2 = new Date(val.updated_at ? val.updated_at : dateCard);
            //         runtime = Math.abs(sub2 - sub1); 
            //     } else {
            //         var sub1 =  new Date(val.created_at);
            //         var sub2 = new Date(val.updated_at ? val.updated_at : dateCard);
            //         stop = Math.abs(sub2 - sub1);
            //     }
            //     return { runtime: runtime == undefined ? 0 : runtime, stop: stop == undefined ? 0 : stop}
            // });

            //Card Mesin 2
            // const cardMesin2 = dataFix.filter(ind => ind.mc_id == 2).map(ind => {
            //     let runtime, stop;
            //     if(ind.name == "RUN") {
            //         var sub1 =  new Date(ind.created_at);
            //         var sub2 =  new Date(ind.updated_at ? ind.updated_at : dateCard);
            //         runtime = Math.abs(sub2 - sub1);
            //     } else {
            //         var sub1 = new Date(ind.created_at);
            //         var sub2 = new Date(ind.updated_at ? ind.updated_at : dateCard);
            //         stop = Math.abs(sub2 - sub1);
            //     }
            //     return {runtime: runtime == undefined ? 0 : runtime, stop: stop == undefined ? 0 : stop}
            // });
            const testHitungDuration1 = dataFixFilter1.filter(val => String(val.tgl) == String(ddate4)).map(val => val.duration).reduce((acc, val) => Number(acc)+Number(val));
            const testHitungDuration2 = dataFixFilter2.filter(val => String(val.tgl) == String(ddate4)).map(val => val.duration).reduce((acc, val) => Number(acc)+Number(val));
            console.log(testHitungDuration1+' ini mesin 1')
            console.log(testHitungDuration2+' ini mesin 2')
            var runMesin1 = cardMesin1.map(val => val.runtime).reduce((acc, val) => acc + val)/60000;
            var runHoursMesin1 = Math.floor(runMesin1/60);
            var runMinutesMesin1 = Math.round(runMesin1%60);
            
            var stopMesin1 = cardMesin1.map(val => val.stop).reduce((acc, val) => acc + val)/60000;
            var stopHoursMesin1 = Math.floor(stopMesin1/60);
            var stopMinutesMesin1 = Math.round(stopMesin1%60);
            
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
            const donutQualityDataOk = dataFix2.filter(val => val.Status == 'OK');
            const donutQualityDataNg = dataFix2.filter(val => val.Status == 'NG');
            //INSERT DATA TO QUALITY CARD
            document.getElementById('totQty').innerText = dataFix2.length;
            document.getElementById('okQty').innerText = donutQualityDataOk.length;
            document.getElementById('ngQty').innerText = donutQualityDataNg.length;
            //INSERT DATA TO QUALITY DONUT CHART
            donQtyData.datasets[0].data[0] = donutQualityDataOk.length;
            donQtyData.datasets[0].data[1] = donutQualityDataNg.length;
            DonutQty.update();
            //INSERT DATA TO QUALITY BAR CHART
            barQtyData.datasets[0].data[0] = dataFix2.length;
            barQtyData.datasets[0].data[1] = donutQualityDataOk.length;
            barQtyData.datasets[0].data[2] = donutQualityDataNg.length;
            barQty.update();

            //INSERT DATA TO PERFORMANCE CARD
            document.getElementById('tarPrf').innerText = dataFix4[0].TARGET;
            document.getElementById('actPrf').innerText = dataFix3.length;
            document.getElementById('perPrf').innerHTML = Number(dataFix3.length/dataFix4[0].TARGET*100).toFixed(2) + '%';
            //INSERT DATA TO PERFORMANCE DONUT CHART
            donPerData.datasets[0].data[0] = dataFix3.length;
            donPerData.datasets[0].data[1] = dataFix4[0].TARGET-dataFix3.length;
            DonutPer.update();
            
            //INSERT DATA TO PERFORMANCE BAR CHART (ACTUAL)
            barPerData.datasets[1].data = [];
            const indexActualPerfBar = dataFix3.map((val,ind) => {
                const response = {x:val.timestamp, y:ind+1};
                barPerData.datasets[1].data.push(response);
            });
            //INSERT DATA TO PERFORMANCE BAR CHART (TARGET)
            barPerData.datasets[0].data = [];
            const indexTargetPerfBar = dataFix4.map((val,ind) => {
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
                OEEData.datasets[0].data[1] = 100 -  oeeDonutChart;
            } else {
                OEEData.datasets[0].data[1] = 0;
            }
            myChart.update();
        });


    </script>
</div>
