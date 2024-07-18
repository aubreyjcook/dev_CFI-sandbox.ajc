( function( blocks, element, blockEditor, components ) {
    var el = element.createElement;
    var InspectorControls = blockEditor.InspectorControls;
    var PanelBody = components.PanelBody;
    var TextControl = components.TextControl;
    var useBlockProps = blockEditor.useBlockProps;

    blocks.registerBlockType( 'mytheme/simple-script-block', {
        title: 'Simple Script Block',
        icon: 'media-code',
        category: 'widgets',
        attributes: {
            scriptUrl: {
                type: 'string',
                default: ''
            }
        },
        edit: function( props ) {
            var blockProps = useBlockProps();
            var { attributes, setAttributes } = props;

            function onChangeScriptUrl( newUrl ) {
                setAttributes( { scriptUrl: newUrl } );
            }

            return el('div', blockProps,
                el(InspectorControls, null,
                    el(PanelBody, { title: 'Script Settings' },
                        el(TextControl, {
                            label: 'External Script URL',
                            value: attributes.scriptUrl,
                            onChange: onChangeScriptUrl,
                            placeholder: 'Enter script URL...'
                        })
                    )
                ),
                // Placeholder for the external script content
                el('div', { id: 'external-script-placeholder' })
            );
        },
        save: function( props ) {
            var blockProps = useBlockProps.save();
            var { attributes } = props;

            return el('div', blockProps,
                // Placeholder for the external script content
                el('div', { id: 'external-script-placeholder' })
            );
        }
    });
}(
    window.wp.blocks,
    window.wp.element,
    window.wp.blockEditor,
    window.wp.components
));