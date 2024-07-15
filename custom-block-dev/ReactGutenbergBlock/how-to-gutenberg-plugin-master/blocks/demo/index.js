/**
 * Block dependencies
 */
import icon from "./icon";
import "./style.scss";
import "./editor.scss";

/**
 * Internal block libraries
 */
const { __ } = wp.i18n;
const { registerBlockType } = wp.blocks;
const { RichText } = wp.editor;

/**
 * Register block
 */
export default registerBlockType("raw-text", {
  title: __("Raw Text", "jsforwphowto"),
  description: __(
    "Blocktype for adding raw text to the page.",
    "jsforwphowto"
  ),
  category: "common",
  icon: {
    background: "#0073AA",
    src: icon
  },
  keywords: [
    __("Raw Text", "jsforwphowto")
  ],
  supports: {
    html: false
  },
  attributes: {
    message: {
      type: "array",
      source: "children",
      selector: ".message-body"
    }
  },
  edit: props => {
    const {
      attributes: { message },
      className,
      setAttributes
    } = props;
    const onChangeMessage = message => {
      setAttributes({ message });
    };
    return (
      <div className={className}>
        <h2>{__("Call to Action", "jsforwphowto")}</h2>
        <RichText
          tagName="div"
          multiline="p"
          placeholder={__("Add your custom message", "jsforwphowto")}
          onChange={onChangeMessage}
          value={message}
        />
      </div>
    );
  },
  save: props => {
    const {
      attributes: { message }
    } = props;
    return (
      <div>
        <h2>{__("Call to Action", "jsforwphowto")}</h2>
        <div class="message-body">{message}</div>
      </div>
    );
  }
});
