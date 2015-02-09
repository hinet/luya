<script type="text/ng-template" id="reverse.html">
    <div class="treeview__node">
        <span class="treeview__icon treeview__icon--clickable" ng-show="data.nodes" ng-click="toggleChildren($event)"><span class="treeview__icon--open fa fa-fw fa-minus-square"></span><span class="treeview__icon--closed fa fa-fw fa-plus-square"></span></span><!--
     --><span class="treeview__icon" ng-show="!data.nodes"><span class="fa fa-fw fa-file"></span></span><!--
     --><a class="treeview__link" role="link" ng-click="go(data.id)">
            {{data.title}}
        </a>
    </div>
    <ul class="treeview__list" role="menu">
        <li class="treeview__item" role="menuitem" ng-repeat="data in data.nodes" ng-include="'reverse.html'"></li>
    </ul>
</script>

<script type="text/ng-template" id="createform.html">
<div ng-switch on="showType">

<div ng-switch-default>
<table>
    <tr>
        <td>Titel</td>
        <td><input type="text" ng-model="data.title" placeholder="Hallo Welt" /></td>
    </tr>
    <tr>
        <td>Rewrite</td>
        <td><input type="text" ng-model="data.rewrite" placeholder="hallo-welt" /></td>
    </tr>
    <tr>
        <td>Parent Nav Id</td>
        <td><div ng-if="!data.nav_id"><input type="text" ng-model="data.parent_nav_id" placeholder="0" /></div></td>
    </tr>
    <tr>
        <td>Cat Id</td>
        <td>
            <div ng-if="!data.nav_id">
                <select ng-model="data.cat_id" ng-options="item.id as item.name for item in cat" />
            </div>
            <div ng-if="data.nav_id">
                create page from nav_id: {{data.nav_id}}
            </div>
        </td>
    </tr>
    <tr>
        <td>Lang Id</td>
        <td>
            <select ng-model="data.lang_id" ng-options="item.id as item.name for item in lang" />
        </td>
    </tr>
    <tr>
        <td>Content Nav-Item-Type Id</td>
        <td>
            <select ng-model="data.nav_item_type">
                <option value="1" selected>Page</option>
                <option value="2">Module</option>
                <option value="3">Redirect</option>
            </select>
        </td>
    </tr>
    <tr>
        <td><button ng-click="showTypeContainer()">NEXT</button></td>
    </tr>
</table>
</div>

<div ng-switch-when="1">
    <create-form-page data="data"></create-form-page>
</div>

<div ng-switch-when="2">
    <create-form-module data="data"></create-form-module>
</div>

<div ng-switch-when="3">
    Redir
</div>

<div ng-switch-when="true">
    <p>Diese Seite wurde erfolgreich erstellt!
</div>

</div>

</script>

<script type="text/ng-template" id="createformpage.html">
<table>
<tr>
    <td>Layout</td>
    <td><select ng-model="data.layout_id" ng-options="lts.id as lts.name for lts in layouts"></select></td>
</tr>
</table>
<button ng-click="save()">SAVE</button>
</script>

<script type="text/ng-template" id="createformmodule.html">
<table>
<tr>
    <td>Module Name (Yii2-ID)</td>
    <td><input type="text" ng-model="data.module_name" /></td>
</tr>
</table>
<button ng-click="save()">SAVE</button>
</script>

<div class="main__item main__item--left main__item--fixedsize">
    <nav class="treeview main__fixeditem" role="navigation">

        <div class="treeview__toolbar">
            <a class="button button--green" ui-sref="custom.cmsadd">
                <span class="fa fa-fw fa-plus"></span>
                Neue Seite
            </a>
        </div>

        <ul class="treeview__list" role="menu" ng-controller="CmsMenuTreeController">
            <li class="treeview__item" role="menuitem" ng-repeat="data in tree" ng-include="'reverse.html'"></li>
        </ul>

    </nav>
</div><!-- ./main__left
--><div class="main__item main__item--right main__item--fixedsize" ui-view>
</div> <!-- ./main__right -->
