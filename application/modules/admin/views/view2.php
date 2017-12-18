<div class="col-md-10 content" id="content">
 <style rel="stylesheet">
.statistics-wrap {
  margin: 0 50px;
}
.statistics-data-blocks-container {
  margin-top: 15px;
}
.statistics-data-block {
  position: relative;
  height: 100px;
  text-align: center;
  color: #fff;
}
.statistics-data-block .glyphicon {
  line-height: 100px;
  font-size: 24px;
}
.statistics-data-block-r p {
  position: absolute;
  top: 65px;
  left: 0px;
  width: 100%;
  font-size: 13px;
}
.statistics-data-block-r div {
  padding-top: 10px;
  font-size: 24px;
}
.statistics-data-block-l {
  height: 100%;
  background-color: rgba(0,0,0,.2);
}
.statistics-data-block-l > span{
  position: absolute;
  display: inline-block;
  left: 0;
  top: 42px;
  width: 15px;
  height: 15px;
  font-size: 15px;
}
.statistics-data-block-l > p > span{
  display: inline-block;
  height: 21px;
  vertical-align: middle;
}
.statistics-data-item-wrap {
  line-height: 30px;
  margin: 20px 0;
}
.statistics-data-item-wrap label {
  padding: 0 8px;
  cursor: pointer;
}
.statistics-data-item-wrap label.on {
  background-color: #337ab7;
  color: #fff;
}
.statistics-flow {
  height: 400px;
  margin-top: 30px;
}
.statistics-flow > div{
  height: 442px;
  border: 1px solid #71c10e;
}
.statistics-flow-title {
  padding-left: 14px;
  background-color: #71c10e;
}
.statistics-flow-title > div {
  display: inline-block;
  color: #fff;
  line-height: 40px;
}
.statistics-flow-title > div > span {
  cursor: pointer;
  display: inline-block;
  margin: 0 4px;
  width: 40px;
  border-radius: 3px;
  border: 1px solid #fff;
  height: 22px;
  line-height: 22px;
  text-align: center;
  font-size: 1rem;
}
.statistics-flow-title > div > span.active {
  background-color: #fff;
  color: #71c10e;
}
#statistics-container {
  height: 400px;
}
</style>
<div class="statistics-wrap">
  <div class="statistics-data-blocks-container clearfix">
    <div class="col-md-4 selected" data-type="view">
      <div class="statistics-data-block" style="background-color: #71c10e;">
        <div class="col-md-7 statistics-data-block-r">
          <div class="statistics-total-view">91</div>
          <p>总浏览量</p>
        </div>
        <div class="col-md-5 statistics-data-block-l">
          <!-- <span class="glyphicon glyphicon-user"></span> -->
          <!-- <span class="icon-arrow-up"></span> -->
          <p style="padding-top: 24px;">昨天：<span class="statistics-view-yesterday">0</span></p>
          <p>今天：<span class="statistics-view-today">0</span></p>
        </div>
      </div>
    </div>
    <div class="col-md-4" data-type="user">
      <div class="statistics-data-block" style="background-color: #4989ec;">
        <div class="col-md-7 statistics-data-block-r">
          <p>总用户量</p>
          <div class="statistics-total-user">1</div>
        </div>
        <div class="col-md-5 statistics-data-block-l">
          <!-- <span class="icon-arrow-up"></span> -->
          <!-- <span class="glyphicon glyphicon-object-align-bottom"></span> -->
          <p style="padding-top: 24px;">昨天：<span class="statistics-user-yesterday">0</span></p>
          <p>今天：<span class="statistics-user-today">0</span></p>
        </div>
      </div>
    </div>
    <div class="col-md-4" data-type="order">
      <div class="statistics-data-block" style="background-color: #e0004e;">
        <div class="col-md-7 statistics-data-block-r">
          <p>总订单数</p>
          <div class="statistics-total-order">2</div>
        </div>
        <div class="col-md-5 statistics-data-block-l">
          <!-- <span class="icon-arrow-up"></span> -->
          <p style="padding-top: 24px;">昨天：<span class="statistics-order-yesterday">0</span></p>
          <p>今天：<span class="statistics-order-today">0</span></p>
          <!-- <span class="glyphicon glyphicon-time"></span> -->
        </div>
      </div>
    </div>
  </div>
  <!-- <div>
    <div class="statistics-data-item-wrap">
      <div class="statistics-data-item">
        <span class="field-label">统计指标：</span>
        <div class="field-group">
          <label class="statistics-data-item-inc">增长用户</label>
          <label class="statistics-data-item-online">浏览用户</label>
          <label class="statistics-data-item-pv">浏览数</label>
        </div>
      </div>
    </div>
    <div></div>
    <div></div>
  </div> -->
  <div class="col-md-12 statistics-flow">
    <div class="statistics-border">
      <div class="col-md-12 statistics-flow-title"><div class="flow-title">浏览量曲线图</div><div class="statisticsp-days" style="float: right;margin-right: -4px;"><span class="active" data-days="7">7天</span><span data-days="15">15天</span><span data-days="30">30天</span></div></div>
      <div class="col-md-12" id="statistics-container" data-highcharts-chart="0"><div id="highcharts-i9rx629-0" class="highcharts-container " style="position: relative; overflow: hidden; width: 655px; height: 400px; text-align: left; line-height: normal; z-index: 0; -webkit-tap-highlight-color: rgba(0, 0, 0, 0); font-family: Signika, serif; background: url(&quot;http://www.highcharts.com/samples/graphics/sand.png&quot;);"><svg version="1.1" class="highcharts-root" style="font-family:Signika, serif;font-size:12px;" xmlns="http://www.w3.org/2000/svg" width="655" viewBox="0 0 655 400" height="400"><desc>Created with Highcharts 5.0.3</desc><defs><clipPath id="highcharts-i9rx629-1"><rect x="0" y="0" width="592" height="277" fill="none"></rect></clipPath></defs><rect fill="#fff" class="highcharts-background" x="0" y="0" width="655" height="400" rx="0" ry="0"></rect><rect fill="none" class="highcharts-plot-background" x="53" y="53" width="592" height="277"></rect><g class="highcharts-pane-group"></g><g class="highcharts-plot-lines-0"><path fill="none" stroke="#808080" stroke-width="1" d="M 53 330.5 L 645 330.5" visibility="visible"></path></g><g class="highcharts-grid highcharts-xaxis-grid "><path fill="none" class="highcharts-grid-line" d="M 126.5 53 L 126.5 330" opacity="1"></path><path fill="none" class="highcharts-grid-line" d="M 200.5 53 L 200.5 330" opacity="1"></path><path fill="none" class="highcharts-grid-line" d="M 274.5 53 L 274.5 330" opacity="1"></path><path fill="none" class="highcharts-grid-line" d="M 348.5 53 L 348.5 330" opacity="1"></path><path fill="none" class="highcharts-grid-line" d="M 422.5 53 L 422.5 330" opacity="1"></path><path fill="none" class="highcharts-grid-line" d="M 496.5 53 L 496.5 330" opacity="1"></path><path fill="none" class="highcharts-grid-line" d="M 570.5 53 L 570.5 330" opacity="1"></path><path fill="none" class="highcharts-grid-line" d="M 644.5 53 L 644.5 330" opacity="1"></path><path fill="none" class="highcharts-grid-line" d="M 52.5 53 L 52.5 330" opacity="1"></path></g><g class="highcharts-grid highcharts-yaxis-grid "><path fill="none" stroke="#e6e6e6" stroke-width="1" class="highcharts-grid-line" d="M 53 330.5 L 645 330.5" opacity="1"></path><path fill="none" stroke="#e6e6e6" stroke-width="1" class="highcharts-grid-line" d="M 53 261.5 L 645 261.5" opacity="1"></path><path fill="none" stroke="#e6e6e6" stroke-width="1" class="highcharts-grid-line" d="M 53 192.5 L 645 192.5" opacity="1"></path><path fill="none" stroke="#e6e6e6" stroke-width="1" class="highcharts-grid-line" d="M 53 122.5 L 645 122.5" opacity="1"></path><path fill="none" stroke="#e6e6e6" stroke-width="1" class="highcharts-grid-line" d="M 53 52.5 L 645 52.5" opacity="1"></path></g><rect fill="none" class="highcharts-plot-border" x="53" y="53" width="592" height="277"></rect><g class="highcharts-axis highcharts-xaxis "><path fill="none" class="highcharts-tick" stroke="#ccd6eb" stroke-width="1" d="M 126.5 330 L 126.5 340" opacity="1"></path><path fill="none" class="highcharts-tick" stroke="#ccd6eb" stroke-width="1" d="M 200.5 330 L 200.5 340" opacity="1"></path><path fill="none" class="highcharts-tick" stroke="#ccd6eb" stroke-width="1" d="M 274.5 330 L 274.5 340" opacity="1"></path><path fill="none" class="highcharts-tick" stroke="#ccd6eb" stroke-width="1" d="M 348.5 330 L 348.5 340" opacity="1"></path><path fill="none" class="highcharts-tick" stroke="#ccd6eb" stroke-width="1" d="M 422.5 330 L 422.5 340" opacity="1"></path><path fill="none" class="highcharts-tick" stroke="#ccd6eb" stroke-width="1" d="M 496.5 330 L 496.5 340" opacity="1"></path><path fill="none" class="highcharts-tick" stroke="#ccd6eb" stroke-width="1" d="M 570.5 330 L 570.5 340" opacity="1"></path><path fill="none" class="highcharts-tick" stroke="#ccd6eb" stroke-width="1" d="M 645.5 330 L 645.5 340" opacity="1"></path><path fill="none" class="highcharts-tick" stroke="#ccd6eb" stroke-width="1" d="M 52.5 330 L 52.5 340" opacity="1"></path><path fill="none" class="highcharts-axis-line" stroke="#ccd6eb" stroke-width="1" d="M 53 330.5 L 645 330.5"></path></g><g class="highcharts-axis highcharts-yaxis "><text x="22.5" text-anchor="middle" transform="translate(0,0) rotate(270 22.5 191.5)" class="highcharts-axis-title" style="color:#666666;fill:#666666;" y="191.5">浏览量</text><path fill="none" class="highcharts-axis-line" d="M 53 53 L 53 330"></path></g><g class="highcharts-series-group"><g class="highcharts-series highcharts-series-0 highcharts-line-series highcharts-color-0 " transform="translate(53,53) scale(1 1)" clip-path="url(#highcharts-i9rx629-1)" width="277" height="592"><path fill="none" d="M 37 34.625 L 111 242.375 L 185 277 L 259 34.625 L 333 69.25 L 407 138.5 L 481 277 L 555 277" class="highcharts-graph" stroke="#000000" stroke-width="5" stroke-linejoin="round" stroke-linecap="round" isShadow="true" stroke-opacity="0.049999999999999996" transform="translate(1, 1)"></path><path fill="none" d="M 37 34.625 L 111 242.375 L 185 277 L 259 34.625 L 333 69.25 L 407 138.5 L 481 277 L 555 277" class="highcharts-graph" stroke="#000000" stroke-width="3" stroke-linejoin="round" stroke-linecap="round" isShadow="true" stroke-opacity="0.09999999999999999" transform="translate(1, 1)"></path><path fill="none" d="M 37 34.625 L 111 242.375 L 185 277 L 259 34.625 L 333 69.25 L 407 138.5 L 481 277 L 555 277" class="highcharts-graph" stroke="#000000" stroke-width="1" stroke-linejoin="round" stroke-linecap="round" isShadow="true" stroke-opacity="0.15" transform="translate(1, 1)"></path><path fill="none" d="M 37 34.625 L 111 242.375 L 185 277 L 259 34.625 L 333 69.25 L 407 138.5 L 481 277 L 555 277" class="highcharts-graph" stroke="#13BCE5" stroke-width="2" stroke-linejoin="round" stroke-linecap="round"></path><path fill="none" d="M 27 34.625 L 37 34.625 L 111 242.375 L 185 277 L 259 34.625 L 333 69.25 L 407 138.5 L 481 277 L 555 277 L 565 277" stroke-linejoin="round" visibility="visible" stroke="rgba(192,192,192,0.0001)" stroke-width="22" class="highcharts-tracker"></path></g><g class="highcharts-markers highcharts-series-0 highcharts-line-series highcharts-color-0 highcharts-tracker " transform="translate(53,53) scale(1 1)" clip-path="url(#highcharts-i9rx629-2)" width="277" height="592"><path fill="#13BCE5" d="M 407 138.5 C 407 138.5 407 138.5 407 138.5 C 407 138.5 407 138.5 407 138.5 Z" class="highcharts-halo highcharts-color-0" fill-opacity="0.25"></path><path fill="#13BCE5" d="M 555 273 C 560.328 273 560.328 281 555 281 C 549.672 281 549.672 273 555 273 Z" class="highcharts-point highcharts-color-0"></path><path fill="#13BCE5" d="M 481 273 C 486.328 273 486.328 281 481 281 C 475.672 281 475.672 273 481 273 Z" class="highcharts-point highcharts-color-0"></path><path fill="#13BCE5" d="M 407 134.5 C 412.328 134.5 412.328 142.5 407 142.5 C 401.672 142.5 401.672 134.5 407 134.5 Z" class="highcharts-point highcharts-color-0 " stroke-width="1"></path><path fill="#13BCE5" d="M 333 65.25 C 338.328 65.25 338.328 73.25 333 73.25 C 327.672 73.25 327.672 65.25 333 65.25 Z" class="highcharts-point highcharts-color-0"></path><path fill="#13BCE5" d="M 259 30.625 C 264.328 30.625 264.328 38.625 259 38.625 C 253.672 38.625 253.672 30.625 259 30.625 Z" class="highcharts-point highcharts-color-0"></path><path fill="#13BCE5" d="M 185 273 C 190.328 273 190.328 281 185 281 C 179.672 281 179.672 273 185 273 Z" class="highcharts-point highcharts-color-0 " stroke-width="1"></path><path fill="#13BCE5" d="M 111 238.375 C 116.328 238.375 116.328 246.375 111 246.375 C 105.672 246.375 105.672 238.375 111 238.375 Z" class="highcharts-point highcharts-color-0 " stroke-width="1"></path><path fill="#13BCE5" d="M 37 30.625 C 42.328 30.625 42.328 38.625 37 38.625 C 31.672 38.625 31.672 30.625 37 30.625 Z" class="highcharts-point highcharts-color-0 " stroke-width="1"></path></g></g><text x="308" text-anchor="middle" class="highcharts-title" style="color:black;font-size:16px;font-weight:bold;fill:black;width:591px;" y="22"><tspan>总浏览量统计</tspan></text><text x="308" text-anchor="middle" class="highcharts-subtitle" style="color:black;fill:black;width:591px;" y="40"><tspan>Source: zhichiwangluo.com</tspan></text><g class="highcharts-legend" transform="translate(289,361)"><rect fill="none" class="highcharts-legend-box" rx="0" ry="0" x="0" y="0" width="77" height="24" visibility="visible"></rect><g><g><g class="highcharts-legend-item highcharts-line-series highcharts-color-0 highcharts-series-0" transform="translate(8,3)"><path fill="none" d="M 0 12 L 16 12" class="highcharts-graph" stroke="#13BCE5" stroke-width="2"></path><path fill="#13BCE5" d="M 8 8 C 13.328 8 13.328 16 8 16 C 2.6719999999999997 16 2.6719999999999997 8 8 8 Z" class="highcharts-point"></path><text x="21" style="color:#333333;font-size:13px;font-weight:bold;cursor:pointer;fill:#333333;" text-anchor="start" y="16">浏览量</text></g></g></g></g><g class="highcharts-axis-labels highcharts-xaxis-labels "><text x="90" style="color:#6e6e70;cursor:default;font-size:11px;fill:#6e6e70;width:74;text-overflow:ellipsis;" text-anchor="middle" transform="translate(0,0)" y="349" opacity="1"><tspan>12/10</tspan></text><text x="164" style="color:#6e6e70;cursor:default;font-size:11px;fill:#6e6e70;width:74;text-overflow:ellipsis;" text-anchor="middle" transform="translate(0,0)" y="349" opacity="1"><tspan>12/11</tspan></text><text x="238" style="color:#6e6e70;cursor:default;font-size:11px;fill:#6e6e70;width:74;text-overflow:ellipsis;" text-anchor="middle" transform="translate(0,0)" y="349" opacity="1"><tspan>12/12</tspan></text><text x="312" style="color:#6e6e70;cursor:default;font-size:11px;fill:#6e6e70;width:74;text-overflow:ellipsis;" text-anchor="middle" transform="translate(0,0)" y="349" opacity="1"><tspan>12/13</tspan></text><text x="386" style="color:#6e6e70;cursor:default;font-size:11px;fill:#6e6e70;width:74;text-overflow:ellipsis;" text-anchor="middle" transform="translate(0,0)" y="349" opacity="1"><tspan>12/14</tspan></text><text x="460" style="color:#6e6e70;cursor:default;font-size:11px;fill:#6e6e70;width:74;text-overflow:ellipsis;" text-anchor="middle" transform="translate(0,0)" y="349" opacity="1"><tspan>12/15</tspan></text><text x="534" style="color:#6e6e70;cursor:default;font-size:11px;fill:#6e6e70;width:74;text-overflow:ellipsis;" text-anchor="middle" transform="translate(0,0)" y="349" opacity="1"><tspan>12/16</tspan></text><text x="608" style="color:#6e6e70;cursor:default;font-size:11px;fill:#6e6e70;width:74;text-overflow:ellipsis;" text-anchor="middle" transform="translate(0,0)" y="349" opacity="1"><tspan>12/17</tspan></text></g><g class="highcharts-axis-labels highcharts-yaxis-labels "><text x="38" style="color:#6e6e70;cursor:default;font-size:11px;fill:#6e6e70;width:206px;text-overflow:clip;" text-anchor="end" transform="translate(0,0)" y="335" opacity="1"><tspan>0</tspan></text><text x="38" style="color:#6e6e70;cursor:default;font-size:11px;fill:#6e6e70;width:206px;text-overflow:clip;" text-anchor="end" transform="translate(0,0)" y="266" opacity="1"><tspan>2</tspan></text><text x="38" style="color:#6e6e70;cursor:default;font-size:11px;fill:#6e6e70;width:206px;text-overflow:clip;" text-anchor="end" transform="translate(0,0)" y="197" opacity="1"><tspan>4</tspan></text><text x="38" style="color:#6e6e70;cursor:default;font-size:11px;fill:#6e6e70;width:206px;text-overflow:clip;" text-anchor="end" transform="translate(0,0)" y="128" opacity="1"><tspan>6</tspan></text><text x="38" style="color:#6e6e70;cursor:default;font-size:11px;fill:#6e6e70;width:206px;text-overflow:clip;" text-anchor="end" transform="translate(0,0)" y="58" opacity="1"><tspan>8</tspan></text></g><text x="645" class="highcharts-credits" text-anchor="end" style="cursor:pointer;color:#999999;font-size:9px;fill:#999999;" y="395">即速应用</text><g class="highcharts-label highcharts-tooltip highcharts-color-0" style="cursor:default;pointer-events:none;white-space:nowrap;" transform="translate(415,-9999)" opacity="0" visibility="visible"><path fill="none" class="highcharts-label-box highcharts-tooltip-box" d="M 3 0 L 87 0 C 90 0 90 0 90 3 L 90 38 C 90 41 90 41 87 41 L 51 41 45 47 39 41 3 41 C 0 41 0 41 0 38 L 0 3 C 0 0 0 0 3 0" isShadow="true" stroke="#000000" stroke-opacity="0.049999999999999996" stroke-width="5" transform="translate(1, 1)"></path><path fill="none" class="highcharts-label-box highcharts-tooltip-box" d="M 3 0 L 87 0 C 90 0 90 0 90 3 L 90 38 C 90 41 90 41 87 41 L 51 41 45 47 39 41 3 41 C 0 41 0 41 0 38 L 0 3 C 0 0 0 0 3 0" isShadow="true" stroke="#000000" stroke-opacity="0.09999999999999999" stroke-width="3" transform="translate(1, 1)"></path><path fill="none" class="highcharts-label-box highcharts-tooltip-box" d="M 3 0 L 87 0 C 90 0 90 0 90 3 L 90 38 C 90 41 90 41 87 41 L 51 41 45 47 39 41 3 41 C 0 41 0 41 0 38 L 0 3 C 0 0 0 0 3 0" isShadow="true" stroke="#000000" stroke-opacity="0.15" stroke-width="1" transform="translate(1, 1)"></path><path fill="rgba(247,247,247,0.85)" class="highcharts-label-box highcharts-tooltip-box" d="M 3 0 L 87 0 C 90 0 90 0 90 3 L 90 38 C 90 41 90 41 87 41 L 51 41 45 47 39 41 3 41 C 0 41 0 41 0 38 L 0 3 C 0 0 0 0 3 0"></path><text x="8" style="font-size:12px;color:#333333;fill:#333333;" y="20"><tspan style="font-size: 10px">12/15</tspan><tspan style="fill:#13BCE5" x="8" dy="15">●</tspan><tspan dx="0"> 浏览量: </tspan><tspan style="font-weight:bold" dx="0">4</tspan></text></g></svg></div></div>
    </div>
  </div>
  
</div>
<script>
$(function(){
  $(".userGroupContent,.userGroupClick").hide();
});
$('.statisticsp-days').on('click', 'span', function(){
  if ($(this).hasClass('active')) {return;}
  $(this).addClass('active').css('color',$('.statistics-flow-title').css('background-color')).siblings().removeClass('active').css('color','#fff');
  initialStatistics();
})
function initialStatistics(){
  $.ajax({
    url : '/index.php?r=pc/WebAppMgr/GetAppStat',
    type: 'get',
    data: {
      app_id: appId,
      days: $('.statisticsp-days span.active').attr('data-days'),
    },
    dataType: 'json',
    success: function(data){
      if(data.status !== 0) { alertTip(data.data); return; }
      $('.statistics-total-view').text(data.data.pv.total);
      $('.statistics-view-yesterday').text(data.data.pv.yesterday);
      $('.statistics-view-today').text(data.data.pv.today);

      $('.statistics-total-user').text(data.data.uv.total);
      $('.statistics-user-yesterday').text(data.data.uv.yesterday);
      $('.statistics-user-today').text(data.data.uv.today);

      $('.statistics-total-order').text(data.data.order.total);
      $('.statistics-order-yesterday').text(data.data.order.yesterday);
      $('.statistics-order-today').text(data.data.order.today);

      $('.col-md-4[data-type="view"]').data('statistics-data', data.data.pv_tendency);
      $('.col-md-4[data-type="user"]').data('statistics-data',data.data.uv_tendency);
      $('.col-md-4[data-type="order"]').data('statistics-data',data.data.order_tendency);

      setStatisticsData($('.col-md-4.selected').data('statistics-data'), $('.col-md-4.selected').index())
    }
  });
}
function setStatisticsData(data, i){
  var dateArr = [],
      statisticsData = [];
  switch(+i){
    case 0 :
      states = {
              title : '总浏览量统计',
              yAxisTitle : '浏览量',
              seriesName : '浏览量'
            };
      break;
    case 1 :
      states = {
              title : '总用户量统计',
              yAxisTitle : '用户量',
              seriesName : '用户量'
            };
      break;
    case 2 :
      states = {
              title : '总订单数统计',
              yAxisTitle : '订单数',
              seriesName : '订单数'
            };
      break;
  }
  for(var key in data) {
    dateArr.push((key+'').substring(4, 6) + '/'+(key+'').substring(6));
    statisticsData.push( +data[key] );//(data[key].uv == undefined ) ? +data[key].pv : +data[key].uv
  }

  $('#statistics-container').highcharts({
    chart: {
      animation: false,
      backgroundColor: '#fff'
    }
    ,title: {
      text: states.title,
      x: -20
    }
    ,subtitle: {
      text: is_domain ? '' :'Source: zhichiwangluo.com',
      x: -20
    }
    ,xAxis: {
      categories: dateArr
    }
    ,yAxis: {
      title: {
        text: states.yAxisTitle
      }
      ,plotLines: [{
        value: 0,
        width: 1,
        color: '#808080'
      }]
    }
    ,tooltip: {
      valueSuffix: ''
    }
    ,legend: {
      layout: 'vertical',
      align: 'center',
      verticalAlign: 'bottom',
      borderWidth: 0
    }
    ,series: [{
      name: states.seriesName,
      data: statisticsData
    }]
    ,credits: {
      enabled: 'true',
      href: is_domain ? '' :'http://jisuapp.cn',
      text: is_domain ? '' :'即速应用'
    }
    ,colors: ["#13BCE5", "#D8FA88", "#8d4654", "#7798BF", "#aaeeee", "#ff0066", "#eeaaee", "#55BF3B", "#DF5353", "#7798BF", "#aaeeee"]
  });
}
$('.statistics-data-blocks-container').on('click','.col-md-4', function(){
  var states, $this = $(this);
  if ($this.hasClass('selected')) {return}
  $this.addClass('selected').siblings().removeClass('selected');
  switch($this.index()){
    case 0:
      $('.statistics-flow-title .flow-title').text('浏览量曲线图');
      
      break;
    case 1:
      $('.statistics-flow-title .flow-title').text('用户量曲线图');
      
      break;
    case 2:
      $('.statistics-flow-title .flow-title').text('订单数曲线图');
      
      break;
  }
  $('.statisticsp-days span.active').css('color', $this.find('.statistics-data-block').css('background-color')).siblings().attr('style','')
  $('.statistics-border').css('border-color',$this.find('.statistics-data-block').css('background-color'));
  $('.statistics-flow-title').css('background-color', $this.find('.statistics-data-block').css('background-color'));
  setStatisticsData($this.data('statistics-data'), $this.index());
})
</script>
</div>

