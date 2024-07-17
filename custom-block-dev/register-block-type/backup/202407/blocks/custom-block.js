const { registerBlockType } = wp.blocks;
const { RichText } = wp.blockEditor;

console.log('Registering custom block...');

registerBlockType('my-theme/my-custom-block', {
    title: 'Custom Block',
    icon: 'smiley',
    category: 'text',
    attributes: {
        message: {
            type: 'string',
            source: 'html',
            selector: 'div',
        },
    },
    edit: (props) => {
        console.log('Editing custom block...');

        const { attributes: { message }, setAttributes } = props;

        const onChangeMessage = (newMessage) => {
            setAttributes({ message: newMessage });
        };

        return (
            <div className={props.className}>
                <RichText
                    tagName="div"
                    value={message}
                    onChange={onChangeMessage}
                    placeholder="Enter your custom message..."
                />
            </div>
        );
    },
    save: (props) => {
        const { attributes: { message } } = props;

        return (
            <div>
                <RichText.Content tagName="div" value={message} />
            </div>
        );
    },
});

console.log('Custom block registered.');