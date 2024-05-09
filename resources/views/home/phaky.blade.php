@extends('layouts.homelayout')
@section('content')
<div style="width:100%; height: 620px;" id="tree"></div>
<script src="{{asset ('public/script/familytree.js')}}"></script>
<script type="text/javascript">
window.onload = function() {
    if (!$("#tree").length) {
        return;
    }
    $menuBtn = $("#tree").find('div');
    $menuBtn.addClass('tree-menu');
};
FamilyTree.templates.tommy = Object.assign({}, FamilyTree.templates.base);
FamilyTree.templates.tommy.defs = `<style>
											.{randId} .bft-edit-form-header, .{randId} .bft-img-button{
												background-color: #aeaeae;
											}
											.{randId}.male .bft-edit-form-header, .{randId}.male .bft-img-button{
												background-color: #039BE5;
											}
											.{randId}.male div.bft-img-button:hover{
												background-color: #F57C00;
											}
											.{randId}.female .bft-edit-form-header, .{randId}.female .bft-img-button{
												background-color: #F57C00;
											}
											.{randId}.female div.bft-img-button:hover{
												background-color: #039BE5;
											}
		</style>`;
FamilyTree.templates.tommy.field_0 =
    '<text ' + FamilyTree.attr.width +
    ' ="230" style="font-size: 18px;font-weight:bold;" fill="#ffffff" x="10" y="90" text-anchor="start">{val}</text>';
FamilyTree.templates.tommy.field_1 =
    '<text ' + FamilyTree.attr.width +
    ' ="75" style="font-size: 14px;" fill="#ffffff" x="10" y="65" text-anchor="start">{val}</text>';
FamilyTree.templates.tommy.node =
    '<rect x="0" y="0" height="{h}" width="{w}" stroke-width="1" fill="#aeaeae" stroke="#aeaeae" rx="7" ry="7"></rect>';
FamilyTree.templates.tommy_male = Object.assign({}, FamilyTree.templates.hugo);
FamilyTree.templates.tommy_male.node =
    '<rect x="0" y="0" height="{h}" width="{w}" stroke-width="1" fill="#039BE5" stroke="#aeaeae" rx="7" ry="7"></rect>';
FamilyTree.templates.tommy_female = Object.assign({}, FamilyTree.templates.hugo);
FamilyTree.templates.tommy_female.node =
    '<rect x="0" y="0" height="{h}" width="{w}" stroke-width="1" fill="#F57C00" stroke="#aeaeae" rx="7" ry="7"></rect>';

FamilyTree.templates.tommy_female.defs =
    `<g transform="matrix(0.05,0,0,0.05,-12,-9)" id="heart">
				<path fill="#FF0000" d="M438.482,58.61c-24.7-26.549-59.311-41.655-95.573-41.711c-36.291,0.042-70.938,15.14-95.676,41.694l-8.431,8.909  l-8.431-8.909C181.284,5.762,98.663,2.728,45.832,51.815c-2.341,2.176-4.602,4.436-6.778,6.778 c-52.072,56.166-52.072,142.968,0,199.134l187.358,197.581c6.482,6.843,17.284,7.136,24.127,0.654 c0.224-0.212,0.442-0.43,0.654-0.654l187.29-197.581C490.551,201.567,490.551,114.77,438.482,58.61z"/>
			<g>
			<style>
				.{randId} .bft-edit-form-header, .{randId} .bft-img-button{
					background-color: #aeaeae;
				}
				.{randId}.male .bft-edit-form-header, .{randId}.male .bft-img-button{
					background-color: #039BE5;
				}
				.{randId}.male div.bft-img-button:hover{
					background-color: #FF0000;
				}
				.{randId}.female .bft-edit-form-header, .{randId}.female .bft-img-button{
					background-color: #F57C00;
				}
				.{randId}.female div.bft-img-button:hover{
					background-color: #FF0000;
				}
			</style>`;
FamilyTree.templates.tommy_male.defs =
    `<g transform="matrix(0.05,0,0,0.05,-12,-9)" id="heart">
				<path fill="#FF0000" d="M438.482,58.61c-24.7-26.549-59.311-41.655-95.573-41.711c-36.291,0.042-70.938,15.14-95.676,41.694l-8.431,8.909  l-8.431-8.909C181.284,5.762,98.663,2.728,45.832,51.815c-2.341,2.176-4.602,4.436-6.778,6.778 c-52.072,56.166-52.072,142.968,0,199.134l187.358,197.581c6.482,6.843,17.284,7.136,24.127,0.654 c0.224-0.212,0.442-0.43,0.654-0.654l187.29-197.581C490.551,201.567,490.551,114.77,438.482,58.61z"/>
			<g>
			<style>
				.{randId} .bft-edit-form-header, .{randId} .bft-img-button{
					background-color: #aeaeae;
				}
				.{randId}.male .bft-edit-form-header, .{randId}.male .bft-img-button{
					background-color: #039BE5;
				}
				.{randId}.male div.bft-img-button:hover{
					background-color: #FF0000;
				}
				.{randId}.female .bft-edit-form-header, .{randId}.female .bft-img-button{
					background-color: #FF0000;
				}
				.{randId}.female div.bft-img-button:hover{
					background-color: #039BE5;
				}
			</style>`;

var family = new FamilyTree(document.getElementById("tree"), {
    template: "tommy",
    enableSearch: false,
    scaleInitial: FamilyTree.match.boundary,
    mode: "light",
    scaleMin: 0.4,
    scaleMax: 1,
    nodeBinding: {
        field_0: "name",
        field_1: "birthanddeath",
        img_0: "photo"
    },
    menu: {
        pdf: {
            text: "Xuất file PDF"
        },
        png: {
            text: "Xuất file PNG"
        }
    }
});

var data = {!!json_encode($phakyDetails) !!};
family.load(data);

family.on('expcollclick', function(sender, isCollapsing, nodeId) {
    var node = family.getNode(nodeId);
    if (isCollapsing) {
        family.expandCollapse(nodeId, [], node.ftChildrenIds)
    } else {
        family.expandCollapse(nodeId, node.ftChildrenIds, [])
    }
    return false;
});

family.on('render-link', function(sender, args) {
    if (args.cnode.ppid != undefined)
        args.html += '<use data-ctrl-ec-id="' + args.node.id + '" xlink:href="#heart" x="' + (args.p.xa) +
        '" y="' + (args.p.ya) + '"/>';
    if (args.cnode.isPartner && args.node.partnerSeparation == 30)
        args.html += '<use data-ctrl-ec-id="' + args.node.id + '" xlink:href="#heart" x="' + (args.p.xb) +
        '" y="' + (args.p.yb) + '"/>';
});

function decodeHtmlEntities(encodedString) {
    var tempElement = document.createElement("textarea");
    tempElement.innerHTML = encodedString;
    return tempElement.value;
}

family.on('click', function(sender, args) {
    data.forEach(function getdata(item, index, arr) {
        if (item.id == args.node.id) {
            document.getElementById('header-text').innerHTML = item.name;
            let content = "";
            if (item.birthDate != '')
                content += "<p>Sinh năm: " + item.birthDate + "</p>";
            if (item.deathDate != '')
                content += "<p>Mất năm: " + item.deathDate + "</p>";
            if (item.level != '')
                content += "<p>Đời thứ: " + item.level + "</p>";
            if (item.rank != '')
                content += "<p>Thứ bậc: " + item.rank + "</p>";
            content += item.desc;
            document.getElementById('content-text').innerHTML = decodeHtmlEntities(content);
            openModal(); // Call function to show modal
        }
    });
    return false;
});

</script>
@endsection