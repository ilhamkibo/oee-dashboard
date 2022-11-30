<div>
    <script>

        const setTime2HourBefore = new Date();
        setTime2HourBefore.setHours(setTime2HourBefore.getHours()-2);
        const setTime1HourAfter = new Date();
        setTime1HourAfter.setHours(setTime1HourAfter.getHours()+1);
 
        const setDateTimeToday = new Date();
        setDateTimeToday.setHours(00);
        setDateTimeToday.setMinutes(00);
        setDateTimeToday.setSeconds(00);

        const setDateTimeTomorrow = new Date();
        setDateTimeTomorrow.setDate(setDateTimeTomorrow.getDate() + 1);
        setDateTimeTomorrow.setHours(00);
        setDateTimeTomorrow.setMinutes(00);
        setDateTimeTomorrow.setSeconds(00);

        setInterval(() => Livewire.emit('ubahData'), 1000);

        // const element = document.getElementById("myBtn");
        // element.addEventListener("click", myFunction);
        // function myFunction() {
        //     document.getElementById("demo").innerHTML = "Hello World";
        // }

        

        // OEE DONUT
            const OEELabels = [
                'OEE',
                'LOSS',
            ];

            const OEEData = {
                labels: OEELabels,
                datasets: [{
                label: 'My First dataset',
                backgroundColor: ['#60A9A6', '#D45D79'],
                data: [0, 0],
                }]
            };

            const OEEText = {
                id: 'OEEText',
                afterDatasetsDraw(chart,args,plugins) {
                const { ctx, data, chartArea: {top,bottom,left,right, width,height}, scales:{x,y} }= chart;
                // console.log(left)
                ctx.save();  

                const orderArray=[];
                if (OEEData.datasets[0].data[0] > OEEData.datasets[0].data[1]) {
                    orderArray.push(0,1);
                } else {
                    orderArray.push(1,0);
                }

                ctx.textAlign = 'center';
                // console.log(orderArray)
                //upper value
                ctx.fillStyle = 'black';
                ctx.font = 'bold 40px sans-serif';
                ctx.fillText('OEE', chart.getDatasetMeta(0).data[0].x, chart.getDatasetMeta(0).data[0].y - 20);
                
                //lower value
                ctx.fillStyle = 'green';
                ctx.font = 'bold 35px sans-serif';
                ctx.fillText((Number(data.datasets[0].data[0]).toFixed(2)+'%'), chart.getDatasetMeta(0).data[0].x, chart.getDatasetMeta(0).data[0].y + 50);

                //line
                ctx.beginPath();
                ctx.strokeStyle= 'rgba(102, 102, 102,1)';
                ctx.lineWidth = 3;
                ctx.moveTo(chart.getDatasetMeta(0).data[0].x - 50, chart.getDatasetMeta(0).data[0].y);
                ctx.lineTo(chart.getDatasetMeta(0).data[0].x + 50, chart.getDatasetMeta(0).data[0].y);
                ctx.stroke();
                }
            };

            const OEEConfig = {
                type: 'doughnut',
                data: OEEData,
                options: {
                    maintainAspectRatio: false,
                    plugins: {
                        legend: {
                            display: false,
                        },
                        zoom: {
                            pan: {
                                enabled: false,
                            },
                            zoom: {
                                wheel: {
                                    enabled: false,
                                    modifierKey: 'ctrl',
                                },
                                pinch: {
                                    enabled: false,
                                }
                            }
                        }
                    },
                },
                plugins: [OEEText]
            };

            const myChart = new Chart(
                document.getElementById('myChart'),
                OEEConfig
            );
        
        // END

        // Donut Performance
            const donPerLabels = [
                'Actual',
                'Minus to Target'
            ];

            const donPerData = {
                labels: donPerLabels,
                datasets: [{
                label: 'My First dataset',
                backgroundColor: ['#60A9A6', '#D45D79'],
                data: [0, 1],
                }]
            };

            const doughnutText = {
                id: 'doughnutText',
                afterDatasetsDraw(chart, args, pluginOptions) {
                const{ ctx, data, options, chartArea: {top, bottom, left, right, width, height}} = chart;
                // console.log(bottom);
                ctx.save();
                ctx.font = 'bold 15px sans-serif';
                ctx.textAlign = 'center';
                // console.log(donPerData.datasets[0].data[0])
                ctx.fillText('Performance '+Number(donPerData.datasets[0].data[0]/(donPerData.datasets[0].data[1]+donPerData.datasets[0].data[0])*100).toFixed(2)+'%',width/2,top+(height/2));
                // console.log(right);
                }
            }

            const donPerConfig = {
                type: 'doughnut',
                data: donPerData,
                options: {
                    maintainAspectRatio: false,
                    plugins: {
                        legend:{
                            display: false
                        },
                        zoom: {
                            pan: {
                                enabled: false,
                            },
                            zoom: {
                                wheel: {
                                    enabled: false,
                                    modifierKey: 'ctrl',
                                },
                                pinch: {
                                    enabled: false,
                                }
                            }
                        }
                    }
                },
                plugins: [doughnutText]
            };

            const DonutPer = new Chart(
                document.getElementById('DonutPer'),
                donPerConfig
            );
        // END    
           
        // Donut Quality
            const donQtyLabels = [
                'OK',
                'NG'
            ];

            const donQtyData = {
                labels: donQtyLabels,
                datasets: [{
                label: 'My First dataset',
                backgroundColor: ['#60A9A6', '#D45D79'],
                data: [0, 0],
                }]
            };
            
            const doughnutText2 = {
                id: 'doughnutText2',
                afterDatasetsDraw(chart, args, pluginOptions) {
                const{ ctx, data, options, chartArea: {top, bottom, left, right, width, height}} = chart;
                ctx.save();
                ctx.font = 'bold 15px sans-serif';
                ctx.textAlign = 'center';
                ctx.fillText('Quality '+ Number(donQtyData.datasets[0].data[0]/(donQtyData.datasets[0].data[0]+donQtyData.datasets[0].data[1])*100).toFixed(2) +'%',width/2,top+(height/2));
                // console.log(right);
                }
            };

            const donQtyConfig = {
                type: 'doughnut',
                data: donQtyData,
                options: {
                    maintainAspectRatio: false,
                    plugins: {
                        legend:{
                            display: false
                        },
                        zoom: {
                            pan: {
                                enabled: false,
                            },
                            zoom: {
                                wheel: {
                                    enabled: false,
                                    modifierKey: 'ctrl',
                                },
                                pinch: {
                                    enabled: false,
                                }
                            }
                        }
                    }
                },
                plugins: [doughnutText2]
            };

            const DonutQty = new Chart(
                document.getElementById('DonutQty'),
                donQtyConfig
            );
        // END

        // Donut Availability
            const donAvlLabels = [
                'January',
                'February'
            ];

            const donAvlData = {
                labels: donAvlLabels,
                datasets: [{
                label: 'My First dataset',
                backgroundColor: ['#60A9A6', '#D45D79'],
                data: [0, 1],
                }]
            };

            const doughnutText3 = {
                id: 'doughnutText3',
                afterDatasetsDraw(chart, args, pluginOptions) {
                const{ ctx, data, options, chartArea: {top, bottom, left, right, width, height}} = chart;
                ctx.save();
                ctx.font = 'bold 15px sans-serif';
                ctx.textAlign = 'center';
                ctx.fillText('Availability '+ Number(donAvlData.datasets[0].data[0]/(donAvlData.datasets[0].data[0]+donAvlData.datasets[0].data[1])*100).toFixed(2)+'%',width/2,top+(height/2));
                // console.log(right);
                }
            };

            const donAvlConfig = {
                type: 'doughnut',
                data: donAvlData,
                options: {
                    maintainAspectRatio: false,
                    plugins: {
                        legend:{
                            display: false
                        },
                        zoom: {
                            pan: {
                                enabled: false,
                            },
                            zoom: {
                                wheel: {
                                    enabled: false,
                                    modifierKey: 'ctrl',
                                },
                                pinch: {
                                    enabled: false,
                                }
                            }
                        }
                    }
                },
                plugins: [doughnutText3]
            };

            const DonutAvl = new Chart(
                document.getElementById('DonutAvl'),
                donAvlConfig
            );
        // END

        // Bar Performance
            const barPerLabels = [
                "Target Qty",
                "Actual Qty",
            ];

            const barPerData = {
                labels: barPerLabels,
                datasets: [
                    {
                        label: "Target",
                        data: [
                        { x: "2022-11-09 00:20:38", y: 12 },
                        { x: "2022-11-09 07:33:12", y: 20 },
                        { x: "2022-11-09 09:45:20", y: 22 },
                        { x: "2022-11-09 12:25:11", y: 25 },
                        { x: "2022-11-09 23:41:11", y: 27 },
                        { x: "2022-11-09 23:50:11", y: 30 },
                        ],
                        backgroundColor: "rgba(255,100,120, 1)",
                        // borderWidth: 1,
                    },
                    {
                        label: "Actual",
                        data: [
                        { x: "2022-11-09 00:20:38", y: 11 },
                        { x: "2022-11-09 07:33:12", y: 13 },
                        { x: "2022-11-09 09:45:20", y: 18 },
                        { x: "2022-11-09 12:25:11", y: 23 },
                        { x: "2022-11-09 23:41:11", y: 26 },
                        { x: "2022-11-09 23:50:11", y: 30 },
                        ],
                        backgroundColor: "rgba(255,193,7, 1)",
                        // borderWidth: 1,
                    }
                ]
            };

            const barPerConfig = {
                type: 'line',
                data: barPerData,
                options: {
                    maintainAspectRatio: false,
                    plugins: {
                        legend:{
                            display: false
                        },
                        title: {
                        display: true,
                            text: 'Performance (pcs)'
                        },
                        zoom: {
                            pan: {
                                enabled: true,
                            },
                            zoom: {
                                wheel: {
                                    enabled: true,
                                    modifierKey: 'ctrl',
                                },
                                pinch: {
                                    enabled: true,
                                }
                            }
                        }
                    },
                    scales: {
                            x: {
                                display: true,
                                min: setTime2HourBefore,
                                max: setTime1HourAfter,
                                type: 'time',
                                time: {
                                    unit: "hour",
                                },
                            },
                            y: {
                                display: true,
                                min: 0
                            },
                        },
                }
            };

            const barPer = new Chart(
                document.getElementById('barPer'),
                barPerConfig
            );
        // END
        
        // Bar Quality
            const barQtyLabels = [
                "Check Qty",
                "OK Qty",
                "NG Qty"
            ];

            const barQtyData = {
                labels: barQtyLabels,
                datasets: [{
                    label: 'Quantity checked',
                    backgroundColor:[
                        "#7189BF",
                        "#78B0A0",
                        "#FF8080"
                    ],
                    data: [0,0,0]
                }]
            };

            const barQtyConfig = {
                type: 'bar',
                data: barQtyData,
                options: {
                    indexAxis: 'y',
                    maintainAspectRatio: false,
                    plugins: {
                        legend:{
                            display: false
                        },
                        title: {
                        display: true,
                            text: 'Quality (pcs)'
                        },
                        zoom: {
                            pan: {
                                enabled: true,
                            },
                            zoom: {
                                wheel: {
                                    enabled: true,
                                    modifierKey: 'ctrl',
                                },
                                pinch: {
                                    enabled: true,
                                }
                            }
                        }
                    }
                }
            };

            const barQty = new Chart(
                document.getElementById('barQty'),
                barQtyConfig
            );
        // END

        // Bar Availability
            const barAvlLabels = [
                "Total OP Time",
                "Runtime",
                "Downtime"
            ];

            const barAvlData = {
                labels: barAvlLabels,
                datasets: [{
                    label: 'Minutes',
                    backgroundColor: [
                            "#7189BF",
                            "#78B0A0",
                            "#FF8080"
                        ],
                    data: [0, 0, 0],
                }]
            };

            const barAvlConfig = {
                type: 'bar',
                data: barAvlData,
                options: {
                    maintainAspectRatio: false,
                    indexAxis: 'y',
                    plugins: {
                        legend:{
                            display: false
                        },
                        title: {
                        display: true,
                            text: 'Availability (pcs)'
                        },
                        zoom: {
                            pan: {
                                enabled: true,
                            },
                            zoom: {
                                wheel: {
                                    enabled: true,
                                    modifierKey: 'ctrl',
                                },
                                pinch: {
                                    enabled: true,
                                }
                            }
                        }
                    }
                }
            };

            const barAvl = new Chart(
                document.getElementById('barAvl'),
                barAvlConfig
            );
        // END

        // Run Machine 1
            const runBarLabels = [
                "Machine 1"
            ];

            const runBarData = {
                labels: runBarLabels,
                datasets: [
                    {
                        label: "Running",
                        data: [
                        ["2022-10-26 07:00:00", "2022-10-26 09:00:00"],
                        ],
                        backgroundColor: ["#75B79E"],
                    },
                    {
                        label: "Running",
                        data: [
                        ["2022-10-26 11:00:00", "2022-10-26 14:00:00"],
                        ],
                        backgroundColor: ["#FF8080"],
                    }
                ]
            };

            const runBarConfig = {
                type: 'bar',
                data: runBarData,
                options: {
                    animation: false,
                    indexAxis: "y",
                    barPercentage: 0.5,
                    maintainAspectRatio: false,
                    plugins: {
                        tooltip: {
                            callbacks: {
                                label: (context) => {
                                    console.log(context);
                                    return context.dataset.label + ': ' + context.raw.map(val => moment(val).format("YYYY-MM-DD HH:mm:ss"));
                                },
                            },
                        },
                        legend:{
                            
                            labels: {
                                generateLabels(chart) {
                                    const ava = [{text:'Run',fillStyle:'#75B79E', strokeStyle:'#75B79E', lineWidth: 2},{text:'Stop',fillStyle:'#FF8080',strokeStyle:'#FF8080',lineWidth: 2}];
                                    return ava;  
                                },
                                font: {
                                    size: 13
                                }
                            },
                            display: true,
                        },
                        zoom: {
                            pan: {
                                enabled: true,
                            },
                            zoom: {
                                wheel: {
                                    enabled: true,
                                    modifierKey: 'ctrl',
                                },
                                pinch: {
                                    enabled: true,
                                }
                            }
                        }
                    },
                    scales: {
                        x: {
                            min: setDateTimeToday,
                            max: setDateTimeTomorrow,
                            type: 'time',
                            time: {
                                displayFormats: {
                                    day: 'MMM Do YY',
                                    hour: 'h a',
                                    minute: 'h:mm:ss a'
                                },
                            },
                            grid: {
                                display: true,
                                drawBorder: false,
                            },
                            ticks: {
                                display: true,
                            },
                        },
                        y: {
                            beginAtZero: true,
                            stacked: true,
                            grid: {
                                display: false,
                            },
                            ticks: {
                                display: true,
                            },
                        },
                    }
                }
            };

            const RunChart1 = new Chart(
                document.getElementById('RunChart1'),
                runBarConfig
            );
        // END

        // Run Machine 2
            const runBarLabels2 = [
                'Machine 2'
            ];

            const runBarData2 = {
                labels: runBarLabels2,
                datasets: [
                    {
                        label: "Running",
                        data: [
                        ["2022-10-26 07:00:00", "2022-10-26 09:00:00"],
                        ],
                        backgroundColor: ["#75B79E"],
                    },
                    {
                        label: "Running",
                        data: [
                        ["2022-10-26 11:00:00", "2022-10-26 14:00:00"],
                        ],
                        backgroundColor: ["#FF8080"],
                    }
                ]
            };

            const runBarConfig2 = {
                type: 'bar',
                data: runBarData2,
                options: {
                    animation: false,
                    indexAxis: "y",
                    barPercentage: 0.8,
                    maintainAspectRatio: false,
                    plugins: {
                        tooltip: {
                            callbacks: {
                                label: (context) => {
                                    // console.log(context);
                                    return context.dataset.label + ': ' + context.raw.map(val => moment(val).format("YYYY-MM-DD HH:mm:ss"));
                                },
                            },
                        },
                        legend:{
                            display: false
                        },
                        zoom: {
                            pan: {
                                enabled: true,
                            },
                            zoom: {
                                wheel: {
                                    enabled: true,
                                    modifierKey: 'ctrl',
                                },
                                pinch: {
                                    enabled: true,
                                }
                            }
                        }
                    },
                    scales: {
                        x: {
                            min: setDateTimeToday,
                            max: setDateTimeTomorrow,
                            type: 'time',
                            time: {
                                displayFormats: {
                                    day: 'MMM Do YY',
                                    hour: 'h a',
                                    minute: 'h:mm:ss a'
                                },
                            },
                            grid: {
                                display: true,
                                drawBorder: false,
                            },
                            ticks: {
                                display: true,
                            },
                        },
                        y: {
                            beginAtZero: true,
                            stacked: true,
                            grid: {
                                display: false,
                            },
                            ticks: {
                                display: true,
                            },
                        },
                    }
                }
            };

            const RunChart2 = new Chart(
                document.getElementById('RunChart2'),
                runBarConfig2
            );
        // END    

        function reset() {
            barPer.resetZoom()
            barQty.resetZoom()
            barAvl.resetZoom()
            RunChart1.resetZoom()
            RunChart2.resetZoom()
        }
        
    </script>
</div>
