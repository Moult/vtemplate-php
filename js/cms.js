/**
 * Used for the CMS module
 */

jQuery(function() {
    var containersItems = [
        {'name': 'SECTION', 'title': 'Section', 'css': 'wym_containers_section'},
        {'name': 'ARTICLE', 'title': 'Article', 'css': 'wym_containers_article'},
        {'name': 'DIV', 'title': 'Division', 'css': 'wym_containers_division'},
        {'name': 'P', 'title': 'Paragraph', 'css': 'wym_containers_p'},
        {'name': 'H1', 'title': 'Heading_1', 'css': 'wym_containers_h1'},
        {'name': 'H2', 'title': 'Heading_2', 'css': 'wym_containers_h2'},
        {'name': 'H3', 'title': 'Heading_3', 'css': 'wym_containers_h3'},
        {'name': 'H4', 'title': 'Heading_4', 'css': 'wym_containers_h4'},
        {'name': 'H5', 'title': 'Heading_5', 'css': 'wym_containers_h5'},
        {'name': 'H6', 'title': 'Heading_6', 'css': 'wym_containers_h6'},
        {'name': 'PRE', 'title': 'Preformatted', 'css': 'wym_containers_pre'},
        {'name': 'BLOCKQUOTE', 'title': 'Blockquote', 'css': 'wym_containers_blockquote'},
        {'name': 'TH', 'title': 'Table_Header', 'css': 'wym_containers_th'}
    ];
    var wym = jQuery(".wymeditor").wymeditor({
        iframeBasePath: baseurl + "js/vendor/wymeditor/iframe/pretty/",
        stylesheet: baseurl + "css/cms.css",
        skin: "cms",
        containersItems: containersItems,
        toolsItems: [
            {'name': 'Bold', 'title': 'Strong', 'css': 'wym_tools_strong'},
            {'name': 'Italic', 'title': 'Emphasis', 'css': 'wym_tools_emphasis'},
            {'name': 'Superscript', 'title': 'Superscript', 'css': 'wym_tools_superscript'},
            {'name': 'Subscript', 'title': 'Subscript', 'css': 'wym_tools_subscript'},
            {'name': 'CodeSnippet', 'title': 'Code_Snippet', 'css': 'wym_tools_code'},
            {'name': 'Citation', 'title': 'Citation', 'css': 'wym_tools_citation'},
            {'name': 'InsertOrderedList', 'title': 'Ordered_List', 'css': 'wym_tools_ordered_list'},
            {'name': 'InsertUnorderedList', 'title': 'Unordered_List', 'css': 'wym_tools_unordered_list'},
            {'name': 'Indent', 'title': 'Indent_List', 'css': 'wym_tools_indent'},
            {'name': 'Outdent', 'title': 'Outdent_List', 'css': 'wym_tools_outdent'},
            {'name': 'InjectElement', 'title': 'Inject_Element', 'css': 'wym_tools_inject'},
            {'name': 'ClearElement', 'title': 'Clear_Element', 'css': 'wym_tools_clear'},
            {'name': 'AppendElement', 'title': 'Append_Element', 'css': 'wym_tools_append'},
            {'name': 'Undo', 'title': 'Undo', 'css': 'wym_tools_undo'},
            {'name': 'Redo', 'title': 'Redo', 'css': 'wym_tools_redo'},
            {'name': 'CreateLink', 'title': 'Link', 'css': 'wym_tools_link'},
            {'name': 'Unlink', 'title': 'Unlink', 'css': 'wym_tools_unlink'},
            {'name': 'InsertImage', 'title': 'Image', 'css': 'wym_tools_image'},
            {'name': 'InsertTable', 'title': 'Table', 'css': 'wym_tools_table'},
            {'name': 'Paste', 'title': 'Paste_From_Word', 'css': 'wym_tools_paste'},
            {'name': 'ToggleHtml', 'title': 'HTML', 'css': 'wym_tools_html'},
            {'name': 'Preview', 'title': 'Preview', 'css': 'wym_tools_preview'}
        ],
        postInit: function(wym) {
            $(".wym_tools_inject a").click(function() {
                wym.insert('<p>Replace this text with your content.</p>');
            });
            $(".wym_tools_append a").click(function() {
                wym.html(wym.html() + "<p>Replace this text with your content.</p>");
            });
            $(".wym_tools_clear a").click(function() {
                wym.container('foo');
            });
            var code_on = 0;
            var cite_on = 0;
            $(".wym_tools_code a").click(function() {
                if (code_on == 0) {
                    wym.wrap('<code>', '</code>');
                    code_on = 1;
                } else {
                    wym.unwrap();
                    code_on = 0;
                }
            });
            $(".wym_tools_citation a").click(function() {
                if (cite_on == 0) {
                    wym.wrap('<cite>', '</cite>');
                    cite_on = 1;
                } else {
                    wym.unwrap();
                    cite_on = 0;
                }
            });
        }
    });
});
