$(function(){
    var mapObj = new AMap.Map('container');
    AMap.plugin('AMap.ToolBar',function(){
        var toolbar = new AMap.ToolBar();
        mapObj.addControl(toolbar)
    });

    // 添加地图类型切换插件
    mapObj.plugin(["AMap.MapType"], function () {
        // 地图类型切换
        var mapType = new AMap.MapType({
            //叠加路网图层
            showRoad: true
        });
        mapObj.addControl(mapType);
    });
});