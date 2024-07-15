/**
 * Block dependencies
 */
import icon from "./icon";
import "./style.scss";

/**
 * Internal block libraries
 */
const { __ } = wp.i18n;
const { registerBlockType } = wp.blocks;
const { RichText } = wp.blockEditor;

/**
 * Register block
 */
export default registerBlockType("jsforwphowto/external-source", {
  title: __("External Source", "jsforwphowto"),
  description: __(
    "Create a link to an external article or page",
    "jsforwphowto"
  ),
  category: "common",
  icon: {
    src: icon,
  },
  keywords: [__("Link", "jsforwphowto")],
  attributes: {
    sourceName: {
      type: "array",
      source: "children",
      selector: ".external-source h4",
    },
    title: {
      type: "array",
      source: "children",
      selector: ".external-source h3",
    },
    date: {
      type: "array",
      source: "children",
      selector: ".external-source p",
    },
    anchor: {
      type: "string",
    },
  },
  supports: {
    anchor: true,
  },
  edit: (props) => {
    const {
      attributes: { sourceName, title, date, anchor },
      className,
      setAttributes,
    } = props;
    const onChangeSource = (sourceName) => {
      setAttributes({ sourceName });
    };
    const onChangeTitle = (title) => {
      setAttributes({ title });
    };
    const onChangeDate = (date) => {
      setAttributes({ date });
    };
    return (
      <>
        <div id={anchor} className={"external-source " + className}>
          <>
            <RichText
              tagName="h4"
              style={{ color: "#ea5213", fontSize: "1em" }}
              placeholder={__("Source Name", "jsforwphowto")}
              onChange={onChangeSource}
              value={sourceName}
            />
            <RichText
              tagName="h3"
              placeholder={__("Title (Remember to Link)", "jsforwphowto")}
              onChange={onChangeTitle}
              value={title}
            />
            <RichText
              tagName="p"
              placeholder={__(
                "Date originally posted (optional, month written out)",
                "jsforwphowto"
              )}
              onChange={onChangeDate}
              value={date}
            />
          </>
        </div>
        <hr />
      </>
    );
  },
  save: (props) => {
    const {
      attributes: { className, sourceName, title, date, anchor },
    } = props;
    return (
      <>
        <div id={anchor} class={"external-source " + className}>
          <h4>{sourceName}</h4>
          <h3>{title}</h3>
          {date && <p>{date}</p>}
        </div>
        <hr />
      </>
    );
  },
});
