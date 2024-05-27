( function( blocks, element, editor ) {
    var el = element.createElement;
    var RichText = editor.RichText;
    
    blocks.registerBlockType( 'mytheme/custom-block', {
        title: 'My Custom Block',
        icon: 'universal-access-alt',
        category: 'layout',
        attributes: {
            content: {
                type: 'string',
                source: 'html',
                selector: 'p',
            },
        },
        edit: function( props ) {
            var content = props.attributes.content;

            function onChangeContent( newContent ) {
                props.setAttributes( { content: newContent } );
            }

            return el(
                RichText,
                {
                    tagName: 'p',
                    className: props.className,
                    onChange: onChangeContent,
                    value: content,
                }
            );
        },
        save: function( props ) {
            return el(
                RichText.Content,
                {
                    tagName: 'p',
                    value: props.attributes.content,
                }
            );
        },
    } );
}(
    window.wp.blocks,
    window.wp.element,
    window.wp.blockEditor || window.wp.editor
) );