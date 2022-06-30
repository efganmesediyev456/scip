<template>
    <div class="col-md-12 mb-4">
        <label class="form-label fw-bold">{{ label }}</label>
        <ckeditor @input="$emit('input', $event)"
                  :value="value" :editor="editor" :config="editorConfig"/>
    </div>
</template>

<script>
import ClassicEditor from '@ckeditor/ckeditor5-editor-classic/src/classiceditor';
import Alignment from '@ckeditor/ckeditor5-alignment/src/alignment';
import Autoformat from '@ckeditor/ckeditor5-autoformat/src/autoformat';
import BlockQuote from '@ckeditor/ckeditor5-block-quote/src/blockquote';
import Bold from '@ckeditor/ckeditor5-basic-styles/src/bold';
import Essentials from '@ckeditor/ckeditor5-essentials/src/essentials';
import FindAndReplace from '@ckeditor/ckeditor5-find-and-replace/src/findandreplace';
import FontBackgroundColor from '@ckeditor/ckeditor5-font/src/fontbackgroundcolor';
import FontColor from '@ckeditor/ckeditor5-font/src/fontcolor';
import FontSize from '@ckeditor/ckeditor5-font/src/fontsize';
import GeneralHtmlSupport from '@ckeditor/ckeditor5-html-support/src/generalhtmlsupport';
import HtmlEmbed from '@ckeditor/ckeditor5-html-embed/src/htmlembed';
import Image from '@ckeditor/ckeditor5-image/src/image';
import ImageCaption from '@ckeditor/ckeditor5-image/src/imagecaption';
import ImageResize from '@ckeditor/ckeditor5-image/src/imageresize';
import ImageStyle from '@ckeditor/ckeditor5-image/src/imagestyle';
import ImageToolbar from '@ckeditor/ckeditor5-image/src/imagetoolbar';
import ImageUpload from '@ckeditor/ckeditor5-image/src/imageupload';
import Indent from '@ckeditor/ckeditor5-indent/src/indent';
import IndentBlock from '@ckeditor/ckeditor5-indent/src/indentblock';
import Italic from '@ckeditor/ckeditor5-basic-styles/src/italic';
import Link from '@ckeditor/ckeditor5-link/src/link';
import LinkImage from '@ckeditor/ckeditor5-link/src/linkimage';
import List from '@ckeditor/ckeditor5-list/src/list';
import ListProperties from '@ckeditor/ckeditor5-list/src/listproperties';
import PageBreak from '@ckeditor/ckeditor5-page-break/src/pagebreak';
import Paragraph from '@ckeditor/ckeditor5-paragraph/src/paragraph';
import PasteFromOffice from '@ckeditor/ckeditor5-paste-from-office/src/pastefromoffice';
import RemoveFormat from '@ckeditor/ckeditor5-remove-format/src/removeformat';
import SimpleUploadAdapter from '@ckeditor/ckeditor5-upload/src/adapters/simpleuploadadapter';
import SourceEditing from '@ckeditor/ckeditor5-source-editing/src/sourceediting';
import StandardEditingMode from '@ckeditor/ckeditor5-restricted-editing/src/standardeditingmode';
import Strikethrough from '@ckeditor/ckeditor5-basic-styles/src/strikethrough';
import Subscript from '@ckeditor/ckeditor5-basic-styles/src/subscript';
import Superscript from '@ckeditor/ckeditor5-basic-styles/src/superscript';
import Table from '@ckeditor/ckeditor5-table/src/table';
import TableCaption from '@ckeditor/ckeditor5-table/src/tablecaption';
import TableCellProperties from '@ckeditor/ckeditor5-table/src/tablecellproperties';
import TableProperties from '@ckeditor/ckeditor5-table/src/tableproperties';
import TableToolbar from '@ckeditor/ckeditor5-table/src/tabletoolbar';
import TextTransformation from '@ckeditor/ckeditor5-typing/src/texttransformation';
import Underline from '@ckeditor/ckeditor5-basic-styles/src/underline';
import WordCount from '@ckeditor/ckeditor5-word-count/src/wordcount';
// import Markdown from '@ckeditor/ckeditor5-markdown-gfm/src/markdown';
// import MediaEmbed from '@ckeditor/ckeditor5-media-embed/src/mediaembed';
// import MediaEmbedToolbar from '@ckeditor/ckeditor5-media-embed/src/mediaembedtoolbar';
// import Mention from '@ckeditor/ckeditor5-mention/src/mention';
// import ImageInsert from '@ckeditor/ckeditor5-image/src/imageinsert';
// import Code from '@ckeditor/ckeditor5-basic-styles/src/code';
// import Heading from '@ckeditor/ckeditor5-heading/src/heading';
// import Highlight from '@ckeditor/ckeditor5-highlight/src/highlight';
// import HorizontalLine from '@ckeditor/ckeditor5-horizontal-line/src/horizontalline';
// import HtmlComment from '@ckeditor/ckeditor5-html-support/src/htmlcomment';
// import FontFamily from '@ckeditor/ckeditor5-font/src/fontfamily';
// import SpecialCharacters from '@ckeditor/ckeditor5-special-characters/src/specialcharacters';
// import SpecialCharactersArrows from '@ckeditor/ckeditor5-special-characters/src/specialcharactersarrows';
// import SpecialCharactersCurrency from '@ckeditor/ckeditor5-special-characters/src/specialcharacterscurrency';
// import SpecialCharactersEssentials from '@ckeditor/ckeditor5-special-characters/src/specialcharactersessentials';
// import SpecialCharactersLatin from '@ckeditor/ckeditor5-special-characters/src/specialcharacterslatin';
// import SpecialCharactersMathematical from '@ckeditor/ckeditor5-special-characters/src/specialcharactersmathematical';
// import SpecialCharactersText from '@ckeditor/ckeditor5-special-characters/src/specialcharacterstext';
// import TextPartLanguage from '@ckeditor/ckeditor5-language/src/textpartlanguage';
// import Title from '@ckeditor/ckeditor5-heading/src/title';
// import TodoList from '@ckeditor/ckeditor5-list/src/todolist';
// import EditorWatchdog from '@ckeditor/ckeditor5-watchdog/src/editorwatchdog';

export default {
    props: {
        label: {
            type: String,
            required: true
        },
        value: {
            type: String,
            default: null
        },
    },

    data() {
        return {
            editor: ClassicEditor,
            editorConfig: {
                plugins: [
                    Alignment, Autoformat,
                    BlockQuote, Bold, Essentials, FindAndReplace, FontBackgroundColor,
                    FontColor, GeneralHtmlSupport, FontSize,
                    HtmlEmbed, Image, ImageCaption, ImageResize, ImageStyle, ImageToolbar, ImageUpload,
                    Indent, IndentBlock, Italic, Link, LinkImage, List, ListProperties,
                    PageBreak, Paragraph, PasteFromOffice, RemoveFormat, SimpleUploadAdapter,
                    SourceEditing, StandardEditingMode, Strikethrough, Subscript, Superscript, Table,
                    TableCaption, TableCellProperties, TableProperties, TableToolbar, TextTransformation,
                    Underline, WordCount
                ],
                toolbar: {
                    items: [
                        // 'heading',
                        // 'textPartLanguage',
                        '|',
                        'bold',
                        'italic',
                        'link',
                        'bulletedList',
                        'underline',
                        'strikethrough',
                        'subscript',
                        'superscript',
                        'numberedList',
                        'alignment',
                        'indent',
                        'outdent',
                        'pageBreak',
                        // 'todoList',
                        'removeFormat',
                        // 'specialCharacters',
                        'restrictedEditingException',
                        '|',
                        // 'imageInsert',
                        'imageUpload',
                        'blockQuote',
                        'insertTable',
                        // 'mediaEmbed',
                        'undo',
                        'redo',
                        '|',
                        'fontBackgroundColor',
                        'fontColor',
                        // 'fontFamily',
                        'fontSize',
                        // 'horizontalLine',
                        // 'highlight',
                        '|',
                        'findAndReplace',
                        'sourceEditing',
                        // 'code',
                        'htmlEmbed'
                    ]
                },
                language: localStorage.getItem('language'),
                image: {
                    toolbar: [
                        'imageTextAlternative',
                        'imageStyle:inline',
                        'imageStyle:block',
                        'imageStyle:side',
                        'linkImage'
                    ]
                },
                table: {
                    contentToolbar: [
                        'tableColumn',
                        'tableRow',
                        'mergeTableCells',
                        'tableCellProperties',
                        'tableProperties'
                    ]
                },
                licenseKey: '',
                simpleUpload: {
                    uploadUrl: "/api/file-manager/editor",
                    withCredentials: true,
                    headers: {
                        'Accept': "application/json",
                        'X-CSRF-TOKEN': document.head.querySelector('meta[name="csrf-token"]').content,
                        'Authorization': 'Bearer ' + localStorage.getItem('admin_authorization_token')
                    }
                },
                heading: {
                    options: [
                        {model: 'paragraph', title: 'Paragraph', class: 'ck-heading_paragraph'},
                        {model: 'heading1', view: 'h1', title: 'Heading 1', class: 'ck-heading_heading1'},
                        {model: 'heading2', view: 'h2', title: 'Heading 2', class: 'ck-heading_heading2'},
                        {model: 'heading3', view: 'h3', title: 'Heading 3', class: 'ck-heading_heading3'},
                        {model: 'heading4', view: 'h4', title: 'Heading 4', class: 'ck-heading_heading4'}
                    ]
                },
            }
        }
    },
}
</script>
