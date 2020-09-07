// (function ($) {
//   "use strict";
$(document).on("ready", function () {
  var base_url = $(location).attr("pathname");
  base_url.indexOf(1);
  base_url.toLowerCase();
  base_url =
    window.location.origin === "http://lapor-covid19.mi-kes.net"
      ? ""
      : base_url.split("/")[1] + "/";
  var site_url = window.location.origin + "/" + base_url;

  console.log(site_url);

  // get_chart_harian();

  function get_chart_harian() {
    let chart_harian_covid_sum = echarts.init(
      document.getElementById("chart-harian-covid-sum")
    );
    $.ajax({
      type: "post",
      url: site_url + "kasus/get_data_harian",
      cache: false,
      async: true,
      dataType: "JSON",
      success: function (data, textStatus, jqXHR) {
        let tanggal = [];
        let covid_sum = [];

        $.each(data, function (index, val) {
          tanggal.push(val.tanggal);
          covid_sum.push(val.covid_sum);
        });

        chart_harian_covid_sum.setOption({
          title: {
            text: "Terkonfirmasi\nDirawat + Dirujuk",
            subtext: "\n",
            textAlign: "left",
            padding: [25, 15, 30, 25],
            itemGap: 5,
          },
          grid: {
            top: "20%",
          },
          tooltip: {
            trigger: "axis",
          },
          toolbox: {
            show: false,
            feature: {
              dataView: {
                show: false,
                readOnly: false,
              },
              magicType: {
                show: false,
                type: ["line", "bar"],
              },
              restore: {
                show: false,
              },
              saveAsImage: {
                show: true,
              },
            },
          },
          dataZoom: [
            {
              type: "inside",
              start: 50,
              end: 100,
            },
            {
              start: 50,
              end: 100,
              handleIcon:
                "M10.7,11.9v-1.3H9.3v1.3c-4.9,0.3-8.8,4.4-8.8,9.4c0,5,3.9,9.1,8.8,9.4v1.3h1.3v-1.3c4.9-0.3,8.8-4.4,8.8-9.4C19.5,16.3,15.6,12.2,10.7,11.9z M13.3,24.4H6.7V23h6.6V24.4z M13.3,19.6H6.7v-1.4h6.6V19.6z",
              handleSize: "80%",
              handleStyle: {
                color: "red",
                shadowBlur: 3,
                shadowColor: "rgba(0, 0, 0, 0.6)",
                shadowOffsetX: 2,
                shadowOffsetY: 2,
              },
            },
          ],
          calculable: true,
          xAxis: [
            {
              type: "category",
              data: tanggal,
            },
          ],
          yAxis: [
            {
              type: "value",
            },
          ],
          series: [
            {
              name: "covid",
              type: "bar",
              color: ["#FF4D4A"],
              data: covid_sum,
              markPoint: {
                data: [
                  {
                    type: "max",
                    name: "covid",
                  },
                ],
              },
            },
          ],
        });
      },
    });

    $(window).on("resize", function () {
      setTimeout(function () {
        chart_harian_covid_sum.resize();
      }, 200);
    });
  }
});
// })(jQuery);
