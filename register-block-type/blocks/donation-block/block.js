
/* previous iteration of IIFE function
( function( blocks, element, blockEditor ) {
    var el = element.createElement;
    var RichText = blockEditor.RichText;
    var useBlockProps = blockEditor.useBlockProps;

    blocks.registerBlockType( 'mytheme/donation-block', {
        title: 'Donation Block',
        icon: 'heart',
        category: 'widgets',
        attributes: {
            content: {
                type: 'string',
                source: 'html',
                selector: 'div',
            },
        },
        edit: function( props ) {
            var content = props.attributes.content;

            function onChangeContent( newContent ) {
                props.setAttributes( { content: newContent } );
            }

            return el(
                'div',
                useBlockProps(),
                el( RichText, {
                    tagName: 'div',
                    onChange: onChangeContent,
                    value: content,
                    placeholder: 'Enter your donation form code here...',
                } )
            );
        },
        save: function( props ) {
            return el( RichText.Content, {
                tagName: 'div',
                value: props.attributes.content,
            } );
        },
    } );
}(
    window.wp.blocks,
    window.wp.element,
    window.wp.blockEditor
) ); */

// Updated IIFE function, with two RichText fields, allowing for more complex block structure
( function( blocks, element, blockEditor ) {
    var el = element.createElement;
    var RichText = blockEditor.RichText;
    var useBlockProps = blockEditor.useBlockProps;

    blocks.registerBlockType( 'mytheme/donation-block', {
        title: 'Donation Block',
        icon: 'heart',
        category: 'widgets',
        attributes: {
            mainText: {
                type: 'string',
                source: 'html',
                selector: 'p.main-text'
            },
            additionalText: {
                type: 'string',
                source: 'html',
                selector: 'p.additional-text'
            }
        },
        edit: function( props ) {
            var blockProps = useBlockProps();
            var { attributes, setAttributes } = props;

            function onChangeMainText( newContent ) {
                setAttributes( { mainText: newContent } );
            }

            function onChangeAdditionalText( newContent ) {
                setAttributes( { additionalText: newContent } );
            }

            return el('div', blockProps,
                el('div', { className: 'col-lg-6' },
                    el(RichText, {
                        tagName: 'p',
                        className: 'main-text',
                        onChange: onChangeMainText,
                        value: attributes.mainText,
                        placeholder: 'Insert main membership text here...'
                    }),
                    el('ul', null,
                        el('li', null, 'Advance invitations to events'),
                        el('li', null, 'Presale tickets and special discounts'),
                        el('li', null, 'Quarterly Freethought in Action newsletter')
                    )
                ),
                el('div', { className: 'col-lg-6' },
                    el('h3', null, el('strong', null, 'Membership Benefits')),
                    el(RichText, {
                        tagName: 'p',
                        className: 'additional-text',
                        onChange: onChangeAdditionalText,
                        value: attributes.additionalText,
                        placeholder: 'Insert additional benefits text here...'
                    })
                )
            );
        },
        save: function( props ) {
            var blockProps = useBlockProps.save();
            var { attributes } = props;

            return el('div', blockProps,
                el('div', { className: 'col-lg-6' },
                    el('p', { className: 'main-text' }, attributes.mainText),
                    el('ul', null,
                        el('li', null, 'Advance invitations to events'),
                        el('li', null, 'Presale tickets and special discounts'),
                        el('li', null, 'Quarterly Freethought in Action newsletter')
                    )
                ),
                el('div', { className: 'col-lg-6' },
                    el('h3', null, el('strong', null, 'Membership Benefits')),
                    el('p', { className: 'additional-text' }, attributes.additionalText)
                )
            );
        }
    });
}(
    window.wp.blocks,
    window.wp.element,
    window.wp.blockEditor
));